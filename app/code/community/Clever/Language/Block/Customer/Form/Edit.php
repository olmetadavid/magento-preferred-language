<?php

/**
 * Override the customer edit form to supply specific component for languages.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Block_Customer_Form_Edit extends Mage_Customer_Block_Form_Edit
{

    /**
     * Allows to create a select box with languages.
     *
     * @param string $key
     *   The component name.
     * @param string $title
     *   The component title.
     * @param string $defaultValue
     *   The component default value.
     *
     * @return string
     *   The HTML code of the component.
     */
    public function getLanguageSelectComponent($key, $title, $defaultValue)
    {

        // Get available languages.
        $options = Mage::getModel('clever_language/customer_attribute_source_stores')->getOptionArray();

        $component = $this->getLayout()->createBlock('adminhtml/html_select')
            ->setName($key)
            ->setId($key)
            ->setTitle($title)
            ->setValue($defaultValue)
            ->setOptions($options)
            ->getHtml();

        return $component;
    }

}
