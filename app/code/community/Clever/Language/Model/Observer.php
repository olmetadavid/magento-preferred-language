<?php

/**
 * Observer to select the correct store according to the preferred language.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Model_Observer
{

    /**
     * Define the prefered language at the customer connection.
     */
    public function selectPreferedLanguage()
    {
        // Get the customer.
        $customer = Mage::getSingleton('customer/session')->getCustomer();

        // Get the prefered language.
        // In fact, the language correspond to the store view id.
        $language = $customer->getPreferedLanguage();

        // Define in the cookie, the store code choosen.
        if ($language) {
            Mage::app()->getCookie()->set(Mage_Core_Model_Store::COOKIE_NAME, $language, TRUE);
        }
    }

}
