<?php

namespace Qafoo;

class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    public function testNotifiesTransactionObserverForDeposit()
    {
        $observerMock = $this->getMockBuilder('Qafoo\\TransactionObserver')
            ->disableOriginalConstructor()
            ->getMock();

        $observerMock->expects($this->once())
            ->method('notifyDeposit')
            ->with($this->equalTo(23.42));

        $account = new BankAccount($observerMock);

        $account->deposite(23.42);
    }

    public function testFeesSubtracted()
    {
        $feeCalculatorStub = $this->getMockBuilder('Qafoo\\AccountFeeCalculator')
            ->disableOriginalConstructor()
            ->getMock();

        $feeCalculatorStub->expects($this->any())
            ->method('calculateFees')
            ->will($this->returnValue(4.0));

        $observerDummy = $this->getMockBuilder('Qafoo\\TransactionObserver')
            ->disableOriginalConstructor()
            ->getMock();

        $account = new BankAccount($observerDummy);

        $account->chargeFees($feeCalculatorStub);

        $this->assertEquals(
            -4.0,
            $account->currentBalance()
        );
    }
}
