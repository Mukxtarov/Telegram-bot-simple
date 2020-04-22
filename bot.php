<?php
/**
 * Mukhtarov Umidshox
 * 22.04.2020
 * Telegram: @Mukxtarov
 */
require 'app/controller.php';

use App\TelegramBot;

date_default_timezone_set('Asia/Tashkent');

//Bot tokeni
$token = "";

//Bot ID raqami
$botid = '';

$bot = new TelegramBot($token);

$data = $bot->getData("php://input");
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
$call_data = $callback['data'];
$call_chat_id = $callback['message']['chat']['id'];
$call_message_id = $callback['message']['message_id'];


//AUDIO
$audio = $data['message']['audio'];


//PHOTO
$photo = $data['message']['photo'];


//VIDEO
$video = $data['message']['video'];


$key = $bot->InlineKeyboard([
	[['text' => 'Hello World', 'callback_data' => 'hello']]
]);

$keyedit = $bot->InlineKeyboard([
	[['text' => 'How are you?', 'callback_data' => 'how']]
]);


if($text == "/start"){
	$bot->sendMessage([
		'chat_id' => $chat_id,
		'text' => "<b>Hello</b>\n\n<i>Hello</i>\n\n<code>Hello</code>",
		'parse_mode' => 'HTML',
		'reply_markup' => $key
	]);
}


elseif($call_data == 'hello'){
	$bot->editMessageText([
		'chat_id' => $call_chat_id,
		'message_id' => $call_message_id,
		'text' => "<b>How are you?</b>\n\n<i>How are you?</i>\n\n<code>How are you?</code>",
		'parse_mode' => 'HTML',
		'reply_markup' => $keyedit
	]);
	$bot->answerCallbackQuery([
		'callback_query_id' => $callback_id,
		'text' => "Notification: Hello"
	]);
}


elseif($call_data == 'how'){
	$bot->editMessageText([
		'chat_id' => $call_chat_id,
		'message_id' => $call_message_id,
		'text' => "<b>Hello</b>\n\n<i>Hello</i>\n\n<code>Hello</code>",
		'parse_mode' => 'HTML',
		'reply_markup' => $key
	]);
	$bot->answerCallbackQuery([
		'callback_query_id' => $callback_id,
		'text' => "Notification: How are you?"
	]);
}
