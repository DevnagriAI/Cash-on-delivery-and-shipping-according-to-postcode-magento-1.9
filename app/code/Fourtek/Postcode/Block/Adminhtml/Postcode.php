<?php
class Fourtek_Postcode_Block_Adminhtml_Postcode extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_postcode';
    $this->_blockGroup = 'postcode';
    $this->_headerText = Mage::helper('postcode')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('postcode')->__('Add Item');
    parent::__construct();
  }
}