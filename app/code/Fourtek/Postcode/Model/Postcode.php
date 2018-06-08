<?php

class Fourtek_Postcode_Model_Postcode extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('postcode/postcode');
    }
}