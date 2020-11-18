<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory getFactory()
 */
class StoreNamePlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const FIELD_STORE = 'store';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        return [
            static::FIELD_STORE => $this->getFactory()->getStore()->getStoreName(),
        ];
    }
}
