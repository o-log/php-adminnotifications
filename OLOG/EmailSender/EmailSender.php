<?php


namespace OLOG\EmailSender;


class EmailSender
{
    public static function sendEmails(){
        $email_ids_arr = Email::getAllIdsArrByStatusCreatedAtDesc( Email::STATUS_WAIT);


        foreach ($email_ids_arr as $email_id){

            $email_obj = Email::factory($email_id);

            if($email_obj->sendMail()){
                $email_obj->setStatus(Email::STATUS_SENT);
            }else{
                $email_obj->setStatus(Email::STATUS_FAIL);
            }
            $email_obj->save();

        }
    }

}