<?php 

/**
 * Mukhtarov Umidshox
 * 01.04.2019
 * Telegram: @Mukxtarov
 */
namespace app;

class TelegramBot {


    public function go($method,$datas=[]){
 		$botToken = "776501213:AAFi2J8xLfDF57WrrLkw1F7cSYE69cPXq_g";
        $url = "https://api.telegram.org/bot".$botToken."/".$method;
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
        return $this->go('sendMessage', $type);
    }


    //Nima yuborayotganini ko'rsatish typing...
    public function sendChatAction($type){   
        return $this->go('sendChatAction', $type);
    }

    //Rasm yuborish
    public function sendPhoto($type){   
        return $this->go('sendPhoto', $type);
    }


    //mp3 va boshqa audio fayllarni yuborish
    public function sendAudio($type){   
        return $this->go('sendAudio', $type);
    }

    //Video fayllarni yuborish
    public function sendVideo($type){   
        return $this->go('sendVideo', $type);
    }

    //Voice faqat .ogg formatda yuboradi
    public function sendVoice($type){   
        return $this->go('sendVoice', $type);
    }


    //Botga yuborilgan fayllarni qabul qilish
    public function getFile($type){   
        return $this->go('getFile', $type);
    }
    //Xabarlarni forward qilish
    public function forwardMessage($type){
        return $this->go('forwardMessage', $type);
    }
    //Inline keyboard chiqarish
    public function InlineKeyboard($type){
    	return json_encode(['inline_keyboard' => $type]); 
	}

    //Notification chiqarish uchun ishlatiladigan function
    public function answerCallbackQuery($type){
        return $this->go('answerCallbackQuery', $type);
    }

    public function deleteMessage($type){
        return $this->go('deleteMessage', $type);
    }

    public function getChatMember($type){
        return $this->go('getChatMember', $type);
    }

    //Chatda odam sonini aniqlash
    public function getChatMembersCount($type){
        return $this->go('getChatMembersCount', $type);
    }

    //Message_id orqali messageni o'zgartirish
    public function editMessageText($type){
        return $this->go('editMessageText', $type);
    }


    //Inline Query uchun function
    public function answerInlineQuery($inline_id, $json){
    	return $this->go('answerInlineQuery', [
            'inline_query_id'=>$inline_id,
            'results' => json_encode($json)
        ]);
    }


    public function InputTextMessageContent($type){
    	return $this->go('InputTextMessageContent', $type);
    }


}//CLASS CLOSE