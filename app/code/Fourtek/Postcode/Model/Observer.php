<?php 
class Fourtek_Postcode_Model_Observer {


public function orderPlace($observer){
	
		$event=$observer->getEvent();
		$inc_id=$event->getOrder()->getIncrementId();
                echo $inc_id;
}



public function salesOrderInvoicePay($observer) {

$event = $observer->getEvent();
$invoice=$observer->getInvoice();
$order =$observer->getOrder();   
$incre_id=$order->getIncrementId(); 
 $custname = $order->getBillingAddress()->getName(); 
 $mobileNumber = $order->getBillingAddress()->getTelephone();
 $orderId =$order->getIncrementId();
 $orderAmt=number_format($order->getGrandTotal(),2);
                

/*****************sms*******************/

    $authKey = "125243AmGSDcCc57d8046e";
    $senderId = "DSSHOP";
    $message = urlencode("Dear ".$custname." Order No ".$orderId." worth Rs. ".$orderAmt." Invoice created successfully and ready for packaging.Thank you.");
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url="https://control.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

/***************sms end*********************/ 



}
public function salesOrderShipmentSaveAfter($observer) {

            $shipment = $observer->getEvent()->getShipment();
            $order = $shipment->getOrder();
            $order->getIncrementId(); 
 $incre_id=$order->getIncrementId(); 
 $custname = $order->getBillingAddress()->getName(); 
 $mobileNumber = $order->getBillingAddress()->getTelephone();
 $orderId =$order->getIncrementId();
 $orderAmt=number_format($order->getGrandTotal(),2);

$title = Mage::getModel('sales/order')->loadByIncrementId($orderId)->getTracksCollection()->getFirstItem()->getTitle();
$num =  Mage::getModel('sales/order')->loadByIncrementId($orderId)->getTracksCollection()->getFirstItem()->getNumber();

/*****************sms*******************/

    $authKey = "125243AmGSDcCc57d8046e";
    $senderId = "DSSHOP";
if($num > 0){
$message = urlencode("Dear ".$custname." Order No ".$orderId." worth Rs. ".$orderAmt.". Track your order by ".$title." ID ".$num." Check your mail for more details.Thank you.");
}else{
$message = urlencode("Dear ".$custname." Order No ".$orderId." worth Rs. ".$orderAmt.". Shipment created successfully and ready for ship check your mail for more details.Thank you.");
}

    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url="https://control.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

/***************sms end*********************/ 


}

public function creditmemoSaveAfter($observer) {

$creditmemo = $observer->getEvent()->getCreditmemo();
            $order = $creditmemo->getOrder();
            
 $incre_id=$order->getIncrementId(); 
 $custname = $order->getBillingAddress()->getName(); 
 $mobileNumber = $order->getBillingAddress()->getTelephone();
 $orderId =$order->getIncrementId();
 $orderAmt=number_format($order->getGrandTotal(),2);

/*****************sms*******************/

    $authKey = "125243AmGSDcCc57d8046e";
    $senderId = "DSSHOP";
    $message = urlencode("Dear ".$custname." Order No ".$orderId." worth Rs. ".$orderAmt." Credit Memo Created successfully. Check your mail for more details.Thank you.");
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url="https://control.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

/***************sms end*********************/ 
}



public function paymentCancel($observer) {

                $id=$observer->getPayment()->getId();
		$model=Mage::getModel('sales/order')->load($id);
		$incre_id=$model->getIncrementId();
                $order = Mage::getModel('sales/order')->loadByIncrementId($incre_id);
                $custname = $order->getBillingAddress()->getName();
                $mobileNumber = $order->getBillingAddress()->getTelephone();
                $orderId =$order->getIncrementId();
                $orderAmt=number_format($order->getGrandTotal(),2);

/*****************sms*******************/

    $authKey = "125243AmGSDcCc57d8046e";
    $senderId = "DSSHOP";
    $message = urlencode("Dear ".$custname." Order No ".$orderId." worth Rs. ".$orderAmt." cancelled successfully. Thank you.");
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url="https://control.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);

/***************sms end*********************/       



    }



   
}