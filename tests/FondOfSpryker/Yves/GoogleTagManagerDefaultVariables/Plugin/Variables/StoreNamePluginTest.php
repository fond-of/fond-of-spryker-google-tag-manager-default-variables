<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory;
use Spryker\Shared\Kernel\Store;

class StoreNamePluginTest extends Unit
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

        $plugin = new StoreNamePlugin();
        $plugin->setFactory($factoryMock);

        $factoryMock->expects($this->once())
            ->method('getStore')
            ->willReturn($storeMock);

        $storeMock->expects($this->once())
            ->method('getStoreName')
            ->willReturn('STORE_NAME');

        $result = $plugin->addVariable('pageType', []);

        $this->assertArrayHasKey(StoreNamePlugin::FIELD_STORE, $result);
        $this->assertEquals($result[StoreNamePlugin::FIELD_STORE], 'STORE_NAME');
    }
}
