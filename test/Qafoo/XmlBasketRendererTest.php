<?php

namespace Qafoo;

class XmlBasketRendererTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderEmptyBasket()
    {
        $xmlRenderer = new XmlRenderer();

        $basketStub = $this->getMockBuilder('Qafoo\\Basket')
            ->disableOriginalConstructor()
            ->getMock();

        $basketStub->expects($this->any())
            ->method('items')
            ->will(
                $this->returnValue(
                    array()
                )
            );

        $actualRenderedXml = $xmlRenderer->render($basketStub);

        $expectedRenderedXml = '<basket></basket>';

        $this->assertEquals($expectedRenderedXml, $actualRenderedXml);
    }
    public function testRenderSingleItemWithSingleProduct()
    {
        $xmlRenderer = new XmlRenderer();

        $basketStub = $this->getMockBuilder('Qafoo\\Basket')
            ->disableOriginalConstructor()
            ->getMock();

        $basketStub->expects($this->any())
            ->method('items')
            ->will(
                $this->returnValue(
                    array(
                        new BasketItem(
                            new Product('Harry Potter 1', 2.99),
                            1
                        )
                    )
                )
            );

        $actualRenderedXml = $xmlRenderer->render($basketStub);

        $expectedRenderedXml = '<basket><item><title>Harry Potter 1</title><price>2.99</price><count>1</count></item></basket>';

        $this->assertEquals($expectedRenderedXml, $actualRenderedXml);
    }
}
