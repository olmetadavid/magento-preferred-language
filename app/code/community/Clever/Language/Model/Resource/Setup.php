<?php

/**
 * Contains install resources.
 *
 * @category   Clever
 * @package    Clever_Language
 * @author David OLMETA <dolmeta@clever-age.com>
 */
class Clever_Language_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{

    /**
     * @var Customer Setup
     */
    protected $_customerSetup = null;

    /**
     * @var Customer Group Name
     */
    protected $_customerGroupName = 'Default';

    /**
     * Class constructor.
     *
     * @param string $resourceName
     *   The resource name.
     */
    public function __construct($resourceName)
    {
        parent::__construct($resourceName);

        // Create other resources.
        $this->_customerSetup = Mage::getModel('customer/resource_setup', $resourceName);
    }

    /**
     * Add a customer attribute.
     *
     * @param int $code
     *   The attribute code.
     * @param array $attr
     *   The attribute data.
     */
    public function addCustomerAttribute($code, array $attr)
    {
        return $this->_customerSetup->addAttribute('customer', $code, $attr);
    }

    /**
     * Get the group name for customer attributes.
     *
     * @return string
     *   The group name.
     */
    public function getCustomerAttributeGroupName()
    {
        return $this->_customerGroupName;
    }

    /**
     * Get the customer attributes to add to the system.
     *
     * @return array
     *   Attributes to add.
     */
    public function getCustomCustomerAttributes()
    {
        $attributes['prefered_language'] = array(
            'label' => 'Prefered Language',
            'type' => 'varchar',
            'input' => 'select',
            'source' => 'clever_language/customer_attribute_source_stores',
            'required' => 0,
            'used_in_forms' => array(
                'customer_account_edit',
                'adminhtml_customer'
            ),
        );

        return $attributes;
    }

    /**
     * Get default values for customer atributes.
     *
     * @return array
     *   Default values.
     */
    public function getCustomCustomerAttributeDefaultValues()
    {
        $defaultValues = array(
            'used_in_forms' => array(
                'adminhtml_customer',
            ),
        );

        return $defaultValues;
    }

}