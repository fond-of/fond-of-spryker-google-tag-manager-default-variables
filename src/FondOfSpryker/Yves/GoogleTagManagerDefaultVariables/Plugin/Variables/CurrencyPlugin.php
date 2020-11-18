<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory getFactory()
 */
class CurrencyPlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const FIELD_CURRENCY = 'currency';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        return [
            static::FIELD_CURRENCY => $this->getFactory()->getStore()->getCurrencyIsoCode(),
        ];
    }
}
