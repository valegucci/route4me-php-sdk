<?php
	namespace Route4Me;
	
	$vdir=$_SERVER['DOCUMENT_ROOT'].'/route4me/examples/';

    require $vdir.'/../vendor/autoload.php';
	
	use Route4Me\Route4Me;
	use Route4Me\Order;
	
	// Example refers to getting of an order details.
	
	// Set the api key in the Route4me class
	Route4Me::setApiKey('11111111111111111111111111111111');
	
	
	$orderParameters=Order::fromArray(array(
		"order_id"	=> 78
	));

	$order = new Order();
	
	$response = $order->getOrder($orderParameters);
	
	Route4Me::simplePrint($response);
?>