<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesConfig;

class InternalTrafficPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testAddVariable(): void
    {
        $configMock = $this->getMockBuilder(GoogleTagManagerDefaultVariablesConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $plugin = new InternalTrafficPlugin();
        $plugin->setConfig($configMock);

        $configMock->expects($this->once())
            ->method('getInternalIps')
            ->willReturn(['192.168.0.1', '192.168.0.2', '127.0.0.1']);

        $result = $plugin->addVariable('pageType', [
            InternalTrafficPlugin::PARAM_CLIENT_IP => '127.0.0.1',
        ]);

        $this->assertArrayHasKey(InternalTrafficPlugin::FIELD_INTERNAL_TRAFFIC, $result);
        $this->assertEquals($result[InternalTrafficPlugin::FIELD_INTERNAL_TRAFFIC], true);
    }
}
