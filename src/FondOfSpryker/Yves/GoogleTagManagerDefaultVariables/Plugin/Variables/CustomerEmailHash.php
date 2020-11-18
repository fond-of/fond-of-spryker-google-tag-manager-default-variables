<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesFactory getFactory()
 */
class CustomerEmailHash extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const FIELD_EXTERNAL_ID_HASH = 'externalIdHash';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        $quoteTransfer = $this->getFactory()
            ->getCartClient()
            ->getQuote();

        if (!$quoteTransfer instanceof QuoteTransfer) {
            return [];
        }

        if (!$quoteTransfer->getBillingAddress() instanceof AddressTransfer) {
            return [];
        }

        if (!$quoteTransfer->getBillingAddress()->getEmail()) {
            return [];
        }

        return [
            static::FIELD_EXTERNAL_ID_HASH => sha1($quoteTransfer->getBillingAddress()->getEmail()),
        ];
    }
}
