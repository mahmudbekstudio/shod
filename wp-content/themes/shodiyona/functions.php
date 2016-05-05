<?php

define('THEME_PATH', dirname(__FILE__));
define('INCLUDE_PATH', THEME_PATH.'/include');

require(INCLUDE_PATH . '/wp_init.php');
require(INCLUDE_PATH . '/func.php');
require(INCLUDE_PATH . '/settings.php');
require(INCLUDE_PATH . '/Language.php');


global $q_config;
Language::init(array('language' => $q_config['language'], 'enabled_languages' => $q_config['enabled_languages'], 'language_name' => $q_config['$q_config']));

session_start();
$error=array();
$message=array();
$info_arr=array();

/*if(isset($_GET['start_lang'])) {
	$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
	setcookie('start_lang', $_GET['start_lang'], time()+60*60*24*30, '/', $domain, false);
	wp_redirect( qtrans_convertURL('http://' . $_SERVER["HTTP_HOST"], $_GET['start_lang']) );
	exit;
}*/

/*if (isset($_POST['callback'])) {

    $error['callback'] = array();

    $_POST['callback']['secure_code'] = get_array_item($_POST['callback'], 'secure_code');
    $_POST['callback']['name'] = get_array_item($_POST['callback'], 'name');
    $_POST['callback']['phone'] = get_array_item($_POST['callback'], 'phone');


    if ($_POST['callback']['secure_code'] == '' || !check_session_code('callback', $_POST['callback']['secure_code'])) {
        $error['callback']['secure_code'] = true;
    }
    if ($_POST['callback']['name'] == '') {
        $error['callback']['name'] = true;
    }
    if ($_POST['callback']['phone'] == '') {
        $error['callback']['phone'] = true;
    }

    if (empty($error['callback'])) {
        $headers = 'From: ' . $_POST['callback']['name'] . "\r\n";
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        $mail_message = "<h1>Callback</h1>";
        $mail_message .= "Name: " . $_POST['callback']['name'] . "<br />";
        $mail_message .= "Phone: " . $_POST['callback']['phone'] . "<br />";
        wp_mail( get_option('admin_email'), 'Callback', $mail_message, $headers );
        $_POST['callback'] = array();
        $message['callback']['success'] = true;
    }

}*/

$info_arr['error']=$error;
$info_arr['message']=$message;

set_information($info_arr);
