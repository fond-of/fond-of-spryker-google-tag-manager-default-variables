<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerDefaultVariablesFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function getStore(): Store
    {
        return $this->getProvidedDependency(GoogleTagManagerDefaultVariablesDependencyProvider::STORE);
    }

    /**
     * @return \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientInterface
     */
    public function getCartClient(): GoogleTagManagerDefaultVariablesToCartClientInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerDefaultVariablesDependencyProvider::CART_CLIENT);
    }
}
