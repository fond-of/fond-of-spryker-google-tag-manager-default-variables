<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientBridge;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerDefaultVariablesDependencyProvider extends AbstractBundleDependencyProvider
{
    public const STORE = 'STORE';
    public const CART_CLIENT = 'CART_CLIENT';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addStore($container);
        $container = $this->addCartClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addStore(Container $container): Container
    {
        $container->set(static::STORE, function () {
            return $this->getStore();
        });

        return $container;
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    protected function getStore(): Store
    {
        return Store::getInstance();
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCartClient(Container $container): Container
    {
        $container->set(static::CART_CLIENT, function (Container $container) {
            return new GoogleTagManagerDefaultVariablesToCartClientBridge(
                $container->getLocator()->cart()->client()
            );
        });

        return $container;
    }
}
