<?php

/**
 * Source of the languages select box.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Model_Customer_Attribute_Source_Stores extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{

    /**
     * Get store (language) to let the customer its own prefered.
     *
     * @return array
     *   An array containing all store associated to the customer website id.
     */
    public function getAllOptions()
    {
        // Create helper.
        $languageHelper = Mage::helper('clever_language');

        // Get store associated to the current customer.
        $stores = $languageHelper->getStores();

        if (is_null($this->_options)) {

            // Initialize options.
            $this->_options = array();

            // Fill options array with store informations.
            foreach ($stores as $store) {
                $this->_options[] = array(
                    'value' => $store->getCode(),
                    'label' => $store->getName(),
                );
            }
        }

        return $this->_options;
    }

    /**
     * Get options in a simplified array.
     *
     * @return array
     *   An array containing all options.
     */
    public function getOptionArray()
    {
        $_options = array();
        foreach ($this->getAllOptions() as $option) {
            $_options[$option['value']] = $option['label'];
        }

        return $_options;
    }

}
