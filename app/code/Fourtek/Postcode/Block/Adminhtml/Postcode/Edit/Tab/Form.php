<?php

class Fourtek_Postcode_Block_Adminhtml_Postcode_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('postcode_form', array('legend'=>Mage::helper('postcode')->__('Item information')));
     
      $fieldset->addField('pincode', 'text', array(
          'label'     => Mage::helper('postcode')->__('Pincode'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'pincode',
      ));

     /* $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('postcode')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
	  */
	  $fieldset->addField('canship', 'select', array(
          'label'     => Mage::helper('postcode')->__('Can Ship'),
          'name'      => 'canship',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('postcode')->__('Yes'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('postcode')->__('No'),
              ),
          ),
      ));
	  
		
      $fieldset->addField('cancod', 'select', array(
          'label'     => Mage::helper('postcode')->__('Can Cod'),
          'name'      => 'cancod',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('postcode')->__('Yes'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('postcode')->__('No'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('postcode')->__('Days to Deliver'),
          'title'     => Mage::helper('postcode')->__('Days to Deliver'),
          'style'     => 'width:700px; height:20px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getPostcodeData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getPostcodeData());
          Mage::getSingleton('adminhtml/session')->setPostcodeData(null);
      } elseif ( Mage::registry('postcode_data') ) {
          $form->setValues(Mage::registry('postcode_data')->getData());
      }
      return parent::_prepareForm();
  }
}