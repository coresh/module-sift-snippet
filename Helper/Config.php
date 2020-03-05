<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sift\Snippet\Helper;

use Magento\Framework\App\Helper\Context;

/**
 * Helper to get conifg
 *
 * @api
 * @since 100.0.2
 */
class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Catalog Module
     */
    const MODULE_NAME = 'Sift_Snippet';

    /**
     * Configuration path Beacon Key
     */
    const XML_PATH_SIFT_ACCOUNT_ID = 'fraud_protection/sift/testFrontendKey';

    /**
     * Configuration path for sift Account ID
     */
    const XML_PATH_SIFT_USER_ID = 'fraud_protection/sift/user_id';

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Get play if base video attribute
     *
     * @return mixed
     */
    public function getSiftAccountId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SIFT_ACCOUNT_ID);
    }

    /**
     * Get show related youtube attribute
     *
     * @return mixed
     */
    public function getSiftUserId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_SIFT_USER_ID);
    }
}

