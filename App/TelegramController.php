<?php
/**
 * @author      Mukhtarov Umidjon <mukxtarov@mail.ru>
 * @copyright   2020 (http://kevin.uz)
 */

declare(strict_types=1);

namespace App;


/**
 * Class TelegramController
 * @package App
 */
final class TelegramController
{
    private $token;

    /**
     * TelegramController constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param string $method
     * @param array $data
     * @return array
     */
    public function request(string $method, array $data = [])
    {
        $url = "https://api.telegram.org/bot$this->token/$method";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
            exit;
        }

        return json_decode($res);
    }

    /**
     * @param $data
     * @return array
     */
    public function getData($data){
        return json_decode(file_get_contents($data), TRUE);
    }

    /**
     * To send a text message
     * @param $type
     * @return array
     */
    public function sendMessage(array $type){
        return $this->request('sendMessage', $type);
    }

    /**
     * Status typing...
     * @param $type
     * @return array
     */
    public function sendChatAction($type){
        return $this->request('sendChatAction', $type);
    }

    /**
     * To send a picture
     * @param $type
     * @return array
     */
    public function sendPhoto($type){
        return $this->request('sendPhoto', $type);
    }

    /**
     * To send an audio file
     * @param $type
     * @return array
     */
    public function sendAudio($type){
        return $this->request('sendAudio', $type);
    }

    /**
     * To send an video file
     * @param $type
     * @return array
     */
    public function sendVideo($type){
        return $this->request('sendVideo', $type);
    }

    /**
     * To send an video file | format .ogg
     * @param $type
     * @return array
     */
    public function sendVoice($type){
        return $this->request('sendVoice', $type);
    }

    /**
     * Receive files sent to the bot
     * @param $type
     * @return array
     */
    public function getFile($type){
        return $this->request('getFile', $type);
    }

    /**
     * Forwarding messages
     * Xabarlarni forward qilish
     * @param $type
     * @return array
     */
    public function forwardMessage($type){
        return $this->request('forwardMessage', $type);
    }

    /**
     * Create an inline keyboard
     * Inline keyboard yaratish
     * @param $type
     * @return false|string
     */
    public function inlineKeyboard($type){
        return json_encode(['inline_keyboard' => $type]);
    }

    /**
     * Create a simple keyboard
     * Oddiy keyboard yaratish
     * @param $type
     * @return false|string
     */
    public function ReplyKeyboardMarkup($type){
        return json_encode(['keyboard' => $type]);
    }

    /**
     * Create a notification
     * Notification yaratish
     * @param $type
     * @return array
     */
    public function answerCallbackQuery($type){
        return $this->request('answerCallbackQuery', $type);
    }

    /**
     * Delete the message
     * Xabarni o'chirish
     * @param $type
     * @return array
     */
    public function deleteMessage($type){
        return $this->request('deleteMessage', $type);
    }

    /**
     * Membership check
     * A'zolikni tekshirish
     * @param $type
     * @return array
     */
    public function getChatMember($type){
        return $this->request('getChatMember', $type);
    }

    /**
     * Determine the number of people in the chat
     * Suhbatdoshlar sonini aniqlang
     * @param $type
     * @return array
     */
    public function getChatMembersCount($type){
        return $this->request('getChatMembersCount', $type);
    }

    /**
     * Edit the message
     * Xabarni tahrirlash
     * @param $type
     * @return array
     */
    public function editMessageText($type){
        return $this->request('editMessageText', $type);
    }

}