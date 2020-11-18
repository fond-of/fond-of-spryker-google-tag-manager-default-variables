<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory getFactory()
 * @method \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesConfig getConfig()
 */
class InternalTrafficPlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const FIELD_INTERNAL_TRAFFIC = 'internalTraffic';

    public const PARAM_CLIENT_IP = 'clientIp';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        $internalIps = $this->getConfig()->getInternalIps();

        if (!isset($params[static::PARAM_CLIENT_IP])) {
            return [];
        }

        if (!in_array($params[static::PARAM_CLIENT_IP], $internalIps, true)) {
            return [];
        }

        return [
            static::FIELD_INTERNAL_TRAFFIC => true,
        ];
    }
}
