<?php

class Fourtek_Postcode_Block_Adminhtml_Postcode_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('postcodeGrid');
      $this->setDefaultSort('postcode_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('postcode/postcode')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('postcode_id', array(
          'header'    => Mage::helper('postcode')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'postcode_id',
      ));

      $this->addColumn('pincode', array(
          'header'    => Mage::helper('postcode')->__('Pincode'),
          'align'     =>'left',
          'index'     => 'pincode',
      ));
	  $this->addColumn('canship', array(
          'header'    => Mage::helper('postcode')->__('Can Ship'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'canship',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              2 => 'No',
          ),
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('postcode')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('cancod', array(
          'header'    => Mage::helper('postcode')->__('Can Cod'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'cancod',
          'type'      => 'options',
          'options'   => array(
             1 => 'Yes',
              2 => 'No',
          ),
      ));
	  
	  
	  $this->addColumn('content', array(
          'header'    => Mage::helper('postcode')->__('Days to deliver'),
          'align'     =>'right',
          'width'     => '100px',
          'index'     => 'content',
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('postcode')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('postcode')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('postcode')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('postcode')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('postcode_id');
        $this->getMassactionBlock()->setFormFieldName('postcode');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('postcode')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('postcode')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('postcode/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('postcode')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('postcode')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}