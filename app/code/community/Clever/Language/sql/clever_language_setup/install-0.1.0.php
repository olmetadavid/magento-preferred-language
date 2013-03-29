<?php

/**
 * Install informations about preferred language.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */

// Get the installer.
$installer = $this;
$installer->startSetup();

// Get the customer attributes to add.
$customerAttributes = $installer->getCustomCustomerAttributes();

// Get the default values for customer attributes.
$customerDefaultValues = $installer->getCustomCustomerAttributeDefaultValues();

// Get the group name for customer attributes.
$customerGroupName = $installer->getCustomerAttributeGroupName();

// Get customer entity informations.
$customerEntityTypeId = $installer->getEntityTypeId('customer');
$setId = $installer->getDefaultAttributeSetId($customerEntityTypeId);
$installer->addAttributeGroup($customerEntityTypeId, $setId, $customerGroupName);
$groupId = $installer->getAttributeGroupId($customerEntityTypeId, $setId, $customerGroupName);

// Add each attribute.
foreach ($customerAttributes as $code => $attributeData) {

    // Prepare et add data.
    $data = array_merge($customerDefaultValues, $attributeData);
    $installer->addCustomerAttribute($code, $data);
    $attributeId = $installer->getAttribute($customerEntityTypeId, $code, 'attribute_id');

    // Add attribute info the group.
    $installer->addAttributeToGroup($customerEntityTypeId, $setId, $groupId, $attributeId);

    // Associate attribute to forms.
    $attribute = Mage::getModel('customer/attribute')->load($attributeId);
    $oldUsedInForms = $attribute->getUsedInForms();

    $usedInForms = array_merge((array) $oldUsedInForms, $data['used_in_forms']);
    $attribute->setUsedInForms($usedInForms);
    $attribute->save();
}

$installer->endSetup();
