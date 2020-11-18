<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use Spryker\Yves\Kernel\AbstractBundleConfig;

class GoogleTagManagerDefaultVariablesConfig extends AbstractBundleConfig
{
    public const INTERNAL_IPS = 'INTERNAL_IPS';

    /**
     * @return array
     */
    public function getInternalIps(): array
    {
        return $this->get(static::INTERNAL_IPS, []);
    }
}
