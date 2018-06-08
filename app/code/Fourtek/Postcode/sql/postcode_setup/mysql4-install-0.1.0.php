<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('postcode')};
CREATE TABLE {$this->getTable('postcode')} (
  `postcode_id` int(11) unsigned NOT NULL auto_increment,
  `pincode` varchar(255) NOT NULL default '',
  `canship` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
  `cancod` varchar(255) NOT NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`postcode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 