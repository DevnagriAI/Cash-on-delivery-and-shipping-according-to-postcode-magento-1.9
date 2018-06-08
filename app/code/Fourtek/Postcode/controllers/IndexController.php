<?php
class Fourtek_Postcode_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/postcode?id=15 
    	 *  or
    	 * http://site.com/postcode/id/15 	
    	 */
    	/* 
		$postcode_id = $this->getRequest()->getParam('id');

  		if($postcode_id != null && $postcode_id != '')	{
			$postcode = Mage::getModel('postcode/postcode')->load($postcode_id)->getData();
		} else {
			$postcode = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($postcode == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$postcodeTable = $resource->getTableName('postcode');
			
			$select = $read->select()
			   ->from($postcodeTable,array('postcode_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$postcode = $read->fetchRow($select);
		}
		Mage::register('postcode', $postcode);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }


public function pincodeAction()
{			
$pincode=$this->getRequest()->getParam("postcode");
if(!$pincode==''){
$read= Mage::getSingleton('core/resource')->getConnection('core_read');
$value=$read->query("select * from `postcode` where pincode=$pincode");
$row = $value->fetch();
$cancod = $row['cancod'];
$canship = $row['canship'];
$content = $row['content'];	
if($canship==1 && $cancod==1){ ?>
	<br/>
         <h1>Deliver to:</h1>
	<span><img src="http://dakshashop.com/media/shippingcod/check.png">&nbsp<b>Status : </b>Delivery can be done in this area.</span><br/>
	<span><img src="http://dakshashop.com/media/shippingcod/check.png">&nbsp<b>COD : </b>Cash On Delivery is available in this area.</span><br/>
    <span><img src="http://dakshashop.com/media/shippingcod/check.png">&nbsp<b>Standard Delivery : </b><?php echo "Shipping within ".$content; ?></span>	
	
<?php }else if($canship==2 && $cancod==1){ ?>
	<br/>
<h1>Deliver to:</h1>
	<span><img src="http://dakshashop.com/media/shippingcod/cancel.png">&nbsp<b>Status : </b>Delivery is not available for this pin code.</span><br/>
    <span><img src="http://dakshashop.com/media/shippingcod/cancel.png">&nbsp<b>COD : </b>Cash On Delivery is not available in this area.</span><br/>	
	
<?php }else if($canship==1 && $cancod==2){ ?>
	<br/>
<h1>Deliver to:</h1>
	<span><img src="http://dakshashop.com/media/shippingcod/check.png">&nbsp<b>Status : </b>Delivery can be done in this area.</span><br/>
	<span><img src="http://dakshashop.com/media/shippingcod/cancel.png">&nbsp<b>COD : </b>Cash On Delivery is not available in this area.</span><br/>
    <span><img src="http://dakshashop.com/media/shippingcod/check.png">&nbsp<b>Standard Delivery : </b><?php echo "Shipping within ".$content; ?></span>
	
<?php }else if($canship=='' && $cancod==''){ ?>
	<br/>
<h1>Deliver to:</h1>
<span><img src="http://dakshashop.com/media/shippingcod/cancel.png">&nbsp<b>Status : </b>Delivery is not available for this pin code.</span><br/>
<span><img src="http://dakshashop.com/media/shippingcod/cancel.png">&nbsp<b>COD : </b>Cash On Delivery is not available in this area.</span><br/>	
<?php
	
}	
		
		
		}
			
	}


public function sellerInfoAction()
{
$businessName=$this->getRequest()->getParam("businessName");
$tintan=$this->getRequest()->getParam("tintan");
$pincode=$this->getRequest()->getParam("pincode");
$businessAddress=$this->getRequest()->getParam("businessAddress");
$partnerId=$this->getRequest()->getParam("partnerId");
$pancard=$this->getRequest()->getParam("pancard");
$addressProof=$this->getRequest()->getParam("addressProof");
$tintanCertificate=$this->getRequest()->getParam("tintanCertificate");
$idProof=$this->getRequest()->getParam("idProof");
$cheque=$this->getRequest()->getParam("cheque");

$write_connection = Mage::getSingleton('core/resource')->getConnection('core_write'); 
$fields_arr = array();
$fields_arr['business_name'] = $businessName;
$fields_arr['tin_tan_number'] = $tintan;
$fields_arr['pincode'] = $pincode;
$fields_arr['business_address'] = $businessAddress;
$fields_arr['customer_id'] = $partnerId;
/*
try {
$uploader = new   Varien_File_Uploader('pancard');   $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
$uploader->setAllowRenameFiles(true); $uploader->setFilesDispersion(false);
$path = Mage::getBaseDir('media').'/avatar/';
// move_uploaded_file( $_FILES[‘userFile’][‘tmp_name’], $path);
$uploader->save($path, $_FILES['pancard']['name']);
} catch (Exception $e) {
echo 'Error Message: '.$e->getMessage();
}
}
echo $_FILES['pancard']['name'];
*/

$row = $write_connection ->insert('sellers_info', $fields_arr);
if($row)
{
echo "Your information saved.";
}
}











}