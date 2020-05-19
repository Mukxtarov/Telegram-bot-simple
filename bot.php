<?php
/**
 * @author      Mukhtarov Umidjon <mukxtarov@mail.ru>
 * @copyright   2020 (http://kevin.uz)
 */

require 'App/TelegramController.php';

use App\TelegramController;

date_default_timezone_set('Asia/Tashkent');

$config = require __DIR__.'/config.php';

$bot = new TelegramController($config['token']);


$data = $bot->getData("php://input");
$chat_id = $data['message']['chat']['id'];
$user_id = $data['message']['from']['id'];
$username = $data['message']['from']['username'];
$ism = $data['message']['from']['first_name'].' '.$data['message']['from']['last_name'];
$text = $data['message']['text'];
$message_id = $data['message']['message_id'];


/** CallbackQuery */
$callback = $data['callback_query'];
$callback_id = $callback['id'];
$call_data = $callback['data'];
$call_chat_id = $callback['message']['chat']['id'];
$call_message_id = $callback['message']['message_id'];


/** Audio */
$audio = $data['message']['audio'];

/** Photo */
$photo = $data['message']['photo'];

/** Video */
$video = $data['message']['video'];


$key = $bot->InlineKeyboard([
	[['text' => 'Hello World', 'callback_data' => 'hello']]
]);

$key_edit = $bot->InlineKeyboard([
	[['text' => 'How are you?', 'callback_data' => 'how']]
]);

$keyboard = $bot->ReplyKeyboardMarkup([
   ['😄🖐 Hello world!']
]);

if($text == "/start"){
	$bot->sendMessage([
		'chat_id' => $chat_id,
		'text' => "<b>Hello</b>\n\n<i>Hello</i>\n\n<code>Hello</code>",
		'parse_mode' => 'HTML',
		'reply_markup' => $keyboard
	]);
}

if($text == "/inline"){
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
		'reply_markup' => $key_edit
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
