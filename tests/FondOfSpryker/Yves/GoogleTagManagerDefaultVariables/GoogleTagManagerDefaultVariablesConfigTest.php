<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use Codeception\Test\Unit;

class GoogleTagManagerDefaultVariablesConfigTest extends Unit
{
    /**
     * @var GoogleTagManagerDefaultVariablesConfig
     */
    protected $config;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->config = new GoogleTagManagerDefaultVariablesConfig();
    }

    /**
     * @return void
     */
    public function testGetInternalIps(): void
    {
        $this->assertIsArray($this->config->getInternalIps());
    }
}
