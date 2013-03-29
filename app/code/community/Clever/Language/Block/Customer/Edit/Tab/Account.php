<?php

/**
 * Hide the language field if the customer has not been created.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Block_Customer_Edit_Tab_Account extends Mage_Adminhtml_Block_Customer_Edit_Tab_Account
{
    /**
     * Update the customer account on admin website.
     *
     * @return Clever_Language_Block_Customer_Edit_Tab_Account
     */
    public function initForm()
    {
        parent::initForm();

        // Récupération du fieldset général.
        $fieldset = $this->getForm()->getElement('base_fieldset');

        // Get customer.
        $customer = Mage::registry('current_customer');

        // If the customer is not created yet, hide the field.
        if (!$customer->getId()) {
            $fieldset->removeField('prefered_language');
        }

        return $this;
    }

}