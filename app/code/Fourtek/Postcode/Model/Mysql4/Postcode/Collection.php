<?php

class Fourtek_Postcode_Model_Mysql4_Postcode_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('postcode/postcode');
    }
}