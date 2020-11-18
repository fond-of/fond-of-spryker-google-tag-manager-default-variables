<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory;
use Spryker\Shared\Kernel\Store;

class CurrencyPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testAddVariable(): void
    {
        $factoryMock = $this->getMockBuilder(GoogleTagManagerDefaultVariablesFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $storeMock = $this->getMockBuilder(Store::class)
            ->disableOriginalConstructor()
            ->getMock();

        $plugin = new CurrencyPlugin();
        $plugin->setFactory($factoryMock);

        $factoryMock->expects($this->once())
            ->method('getStore')
            ->willReturn($storeMock);

        $storeMock->expects($this->once())
            ->method('getCurrencyIsoCode')
            ->willReturn('EUR');

        $result = $plugin->addVariable('pageType', []);

        $this->assertArrayHasKey(CurrencyPlugin::FIELD_CURRENCY, $result);
        $this->assertEquals($result[CurrencyPlugin::FIELD_CURRENCY], 'EUR');
    }
}
