<?php
global $currencyCode, $currencyList;
$currencyCode = 'uzs';
$currencyList = get_field('currency', 'option');
if(isset($_COOKIE['currencyCode'])) {
	$isExist = false;
	foreach($currencyList as $key => $val) {
		if($_COOKIE['currencyCode'] == $key) {
			$isExist = true;
			break;
		}
	}
	if($isExist) {
		$currencyCode = $_COOKIE['currencyCode'];
	} else {
		unset($_COOKIE['currencyCode']);
		setcookie('currencyCode', null, -1);
	}
}

if(!isset($_COOKIE['currencyCode'])) {
	setcookie("currencyCode", $currencyCode, time()+(60*60*24*30), '/');
}

global $currentUrl;
$currentUrl = site_url() . $_SERVER['REQUEST_URI'];