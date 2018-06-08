<?php
class Fourtek_Postcode_Block_Postcode extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getPostcode()     
     { 
        if (!$this->hasData('postcode')) {
            $this->setData('postcode', Mage::registry('postcode'));
        }
        return $this->getData('postcode');
        
    }
}