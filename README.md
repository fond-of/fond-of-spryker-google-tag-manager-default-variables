# spryker-google-tag-manager-default-variables

[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/google-tag-manager-default-variable)

## Installation

```
composer require fond-of-spryker/google-tag-manager-default-variable
```

### Desciption

Provides default properties for google tag manager core module. default properties set inside datalayer for all pages.

### Usage

Overwrite core-module dependency provider inside PZY,
i.e src/Pyz/Yves/GoogleTagManagerCore/GoogleTagManagerCoreDependencyProvider.php

```
/**
 * @return \FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface[];
 */
protected function getDefaultGoogleTagManagerExtensionPlugins(): array
{
    return [
        new CurrencyPlugin(),
        new CustomerEmailHash(),
        new InternalTrafficPlugin(),
        new StoreNamePlugin(),
    ];
}
```
