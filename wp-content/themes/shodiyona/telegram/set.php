<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = '236535421:AAFyKhm2hd--VjxlsJjvF0ZP_23s-nCiBVw';
$BOT_NAME = 'shodiyonauzbot';
$hook_url = 'https://shodiyona.uz/wp-content/themes/shodiyona/telegram/hook.php';
try {
	// Create Telegram API object
	$telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);
	// Set webhook
	$result = $telegram->setWebHook($hook_url);
	if ($result->isOk()) {
		echo $result->getDescription();
	}
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
	echo $e;
}