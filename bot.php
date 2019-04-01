<?php 
/**
 * Mukhtarov Umidshox
 * 01.04.2019
 * Telegram: @Mukxtarov
 */
require 'app/controller.php';
use app\TelegramBot;

date_default_timezone_set('Asia/Tashkent');

$bot = new TelegramBot;

//Bot ID raqami
$botid = '';


$data = getData("php://input");
$chat_id = $data['message']['chat']['id'];
$userid = $data['message']['from']['id'];
$username = $data['message']['from']['username'];
$ism = $data['message']['from']['first_name'].' '.$data['message']['from']['last_name'];
$text = $data['message']['text'];
$message_id = $data['message']['message_id'];


//INLIEN QUERY
$inlinequery = $data['inline_query'];
$inline_id = $inlinequery['id'];
$inline_query = $inlinequery['query'];


//CALLBACK
$callback = $data['callback_query'];
$callback_id = $callback['id'];
$cdata = $callback['data'];
$call_chat_id = $callback['message']['chat']['id'];



//AUDIO
$audio = $data['message']['audio'];





$key = $bot->InlineKeyboard([
	[['text' => 'Hello World', 'callback_data' => 'hello']]
]);




if($text == "/start"){
	$bot->sendMessage(['chat_id' => $chat_id, 'text' => 'Hello', 'parse_mode' => 'HTML', 'reply_markup' => $key]);
}
