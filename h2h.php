<?php
/**
 * Created by PhpStorm.
 * User: zilan
 * Date: 2016/12/9
 * Time: 16:03
 */


//$_API = 'https://api.have2have.it/events/conversion?store-id=456&order-id=ZZ1202546&total=109&currency=usd';
$_API = 'https://api.have2have.it/events/conversion';
$store_id = 0;
$order_id = 'zz123456789';
$total = 109;
$currency = 'usd';
$time = 5;
for ($i=0; $i<$time; $i++) {
	$post = array(
		'store-id' => $i,
		'order-id' => 'ZZ1202546',
		'total' => 109,
		'currency' => 'usd'
	);
	echo h2h($_API, $post);
}
function h2h($_API, $post) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch, CURLOPT_URL, $_API);
	curl_setopt($ch, CURLOPT_POST, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	return $result;
}
