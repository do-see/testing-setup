<?php

namespace Qafoo;

class BankAccount
{
    private $transactionObserver;

    private $balance = 0.0;

    public function __construct(TransactionObserver $transactionObserver)
    {
        $this->transactionObserver = $transactionObserver;
    }

    public function deposite($amount)
    {
        $this->balance += $amount;

        $this->transactionObserver->notifyDeposit($amount);
    }

    public function currentBalance()
    {
        return $this->balance;
    }

    public function chargeFees(AccountFeeCalculator $calculator)
    {
        $this->balance -= $calculator->calculateFees($this->balance, new \DateTime('now'));
    }
}
