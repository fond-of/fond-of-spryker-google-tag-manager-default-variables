<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency;

use Generated\Shared\Transfer\QuoteTransfer;

interface GoogleTagManagerDefaultVariablesToCartClientInterface
{
    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuote(): QuoteTransfer;
}
