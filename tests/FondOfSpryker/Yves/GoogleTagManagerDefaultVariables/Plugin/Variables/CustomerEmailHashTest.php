<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientBridge;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class CustomerEmailHashTest extends Unit
{
    /**
     * @return void
     */
    public function testAddVariable(): void
    {
        $factoryMock = $this->getMockBuilder(GoogleTagManagerDefaultVariablesFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $cartClientBridgeMock = $this->getMockBuilder(GoogleTagManagerDefaultVariablesToCartClientBridge::class)
            ->disableOriginalConstructor()
            ->getMock();

        $quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $addressTransferMock = $this->getMockBuilder(AddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $plugin = new CustomerEmailHash();
        $plugin->setFactory($factoryMock);

        $factoryMock->expects($this->once())
            ->method('getCartClient')
            ->willReturn($cartClientBridgeMock);

        $cartClientBridgeMock->expects($this->once())
            ->method('getQuote')
            ->willReturn($quoteTransferMock);

        $quoteTransferMock->expects($this->exactly(3))
            ->method('getBillingAddress')
            ->willReturn($addressTransferMock);

        $addressTransferMock->expects($this->exactly(2))
            ->method('getEmail')
            ->willReturn('john.doe@foobar.com');

        $result = $plugin->addVariable('pageType', []);

        $this->assertArrayHasKey(CustomerEmailHash::FIELD_EXTERNAL_ID_HASH, $result);
        $this->assertEquals($result[CustomerEmailHash::FIELD_EXTERNAL_ID_HASH], sha1('john.doe@foobar.com'));
    }
}
