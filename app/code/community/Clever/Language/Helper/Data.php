<?php

/**
 * Helper providing function to retrieve available stores for customer.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * Get the website id associated to the current customer.
     *
     * @return int
     *   The website id.
     */
    public function getCurrentWebsiteId()
    {
        // Get current website id.
        $currentWebsiteId = Mage::app()->getStore()->getWebsiteId();

        // If the website is admin, get the website of the customer viewed.
        if ($currentWebsiteId == 0) {
            $currentWebsiteId = Mage::registry('current_customer')->getAttribute('website_id')->getId();
        }

        return $currentWebsiteId;
    }

    /**
     * Get all store associated to the current customer.
     *
     * @return array
     *   The list of store.
     */
    public function getStores()
    {
        $stores = Mage::getModel('core/store')
            ->setWebsiteId($this->getCurrentWebsiteId())
            ->getCollection();

        return $stores;
    }

}
