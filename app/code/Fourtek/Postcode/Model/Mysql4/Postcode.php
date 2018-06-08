<?php

class Fourtek_Postcode_Model_Mysql4_Postcode extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the postcode_id refers to the key field in your database table.
        $this->_init('postcode/postcode', 'postcode_id');
    }
}