<?php

/**
 * Mukhtarov Umidshox
 * 01.04.2019
 * Telegram: @Mukxtarov
 */
namespace App;

class TelegramBot {

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function route($method,$datas=[]){
        $url = "https://api.telegram.org/bot".$this->token."/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($res);
        }
    }


    public function getData($data){
        return json_decode(file_get_contents($data), TRUE);
 	  }

    //Xabar yuborish uchun @String
    public function sendMessage($type){
        return $this->route('sendMessage', $type);
    }


    //Nima yuborayotganini ko'rsatish typing...
    public function sendChatAction($type){
        return $this->route('sendChatAction', $type);
    }

    //Rasm yuborish
    public function sendPhoto($type){
        return $this->route('sendPhoto', $type);
    }


    //mp3 va boshqa audio fayllarni yuborish
    public function sendAudio($type){
        return $this->route('sendAudio', $type);
    }

    //Video fayllarni yuborish
    public function sendVideo($type){
        return $this->route('sendVideo', $type);
    }

    //Voice faqat .ogg formatda yuboradi
    public function sendVoice($type){
        return $this->route('sendVoice', $type);
    }


    //Botga yuborilgan fayllarni qabul qilish
    public function getFile($type){
        return $this->route('getFile', $type);
    }
    //Xabarlarni forward qilish
    public function forwardMessage($type){
        return $this->route('forwardMessage', $type);
    }


    //Inline keyboard chiqarish
    public function InlineKeyboard($type){
    	return json_encode(['inline_keyboard' => $type]);
	  }

    //ReplyKeyboardMarkup keyboard chiqarish
    public function ReplyKeyboardMarkup($type){
      return json_encode(['ReplyKeyboardMarkup' => $type]);
    }

    //Notification chiqarish uchun ishlatiladigan function
    public function answerCallbackQuery($type){
        return $this->route('answerCallbackQuery', $type);
    }

    public function deleteMessage($type){
        return $this->route('deleteMessage', $type);
    }

    public function getChatMember($type){
        return $this->route('getChatMember', $type);
    }

    //Chatda odam sonini aniqlash
    public function getChatMembersCount($type){
        return $this->route('getChatMembersCount', $type);
    }

    //Message_id orqali messageni o'zgartirish
    public function editMessageText($type){
        return $this->route('editMessageText', $type);
    }


    //Inline Query uchun function
    public function answerInlineQuery($inline_id, $json){
    	return $this->route('answerInlineQuery', [
            'inline_query_id'=>$inline_id,
            'results' => json_encode($json)
        ]);
    }


    public function InputTextMessageContent($type){
    	return $this->route('InputTextMessageContent', $type);
    }


}//CLASS CLOSE
