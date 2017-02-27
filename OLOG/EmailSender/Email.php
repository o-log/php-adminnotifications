<?php
namespace OLOG\EmailSender;

use OLOG\Model\ActiveRecordTrait;
use OLOG\Model\FactoryTrait;
use OLOG\Model\InterfaceDelete;
use OLOG\Model\InterfaceFactory;
use OLOG\Model\InterfaceLoad;
use OLOG\Model\InterfaceSave;
use OLOG\Model\ProtectPropertiesTrait;

class Email implements
    InterfaceFactory,
    InterfaceLoad,
    InterfaceSave,
    InterfaceDelete
{
    use FactoryTrait;
    use ActiveRecordTrait;
    use ProtectPropertiesTrait;

    const DB_ID = 'db_admin_notifications';
    const DB_TABLE_NAME = 'olog_emailsender_email';

    const _ID = 'id';
    const _CREATED_AT_TS = 'created_at_ts';
    const _SUBJECT = 'subject';
    protected $subject;
    const _BODY = 'body';
    protected $body;
    const _EMAIL_TO = 'email_to';
    protected $email_to;
    const _EMAIL_FROM = 'email_from';
    protected $email_from;
    const _NOTIFICATION_ID = 'notification_id';
    protected $notification_id;
    protected $id;

    public function getNotificationId(){
        return $this->notification_id;
    }

    public function setNotificationId($value){
        $this->notification_id = $value;
    }



    static public function getIdsArrForEmailToAndNotificationIdByCreatedAtDesc($email, $notification_id){
        return \OLOG\DB\DBWrapper::readColumn(
            self::DB_ID,
            'select id from ' . self::DB_TABLE_NAME . ' where ' . self::_EMAIL_TO . ' = ? AND ' . self::_NOTIFICATION_ID . '=? order by created_at_ts ',
            [$email, $notification_id]
        );
    }


    public function getEmailFrom(){
        return $this->email_from;
    }

    public function setEmailFrom($value){
        $this->email_from = $value;
    }



    public function getEmailTo(){
        return $this->email_to;
    }

    public function setEmailTo($value){
        $this->email_to = $value;
    }



    public function getBody(){
        return $this->body;
    }

    public function setBody($value){
        $this->body = $value;
    }



    public function getSubject(){
        return $this->subject;
    }

    public function setSubject($value){
        $this->subject = $value;
    }




    protected $created_at_ts; // initialized by constructor
    
    public function __construct(){
        $this->created_at_ts = time();
    }

    static public function getAllIdsArrByCreatedAtDesc($offset = 0, $page_size = 30){
        $ids_arr = \OLOG\DB\DBWrapper::readColumn(
            self::DB_ID,
            'select ' . self::_ID . ' from ' . self::DB_TABLE_NAME . ' order by ' . self::_CREATED_AT_TS . ' desc limit ' . intval($page_size) . ' offset ' . intval($offset)
        );
        return $ids_arr;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCreatedAtTs()
    {
        return $this->created_at_ts;
    }

    /**
     * @param string $timestamp
     */
    public function setCreatedAtTs($timestamp)
    {
        $this->created_at_ts = $timestamp;
    }

    public function sendMail(){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $this->getEmailFrom() . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $message = '
        <html>
            <head>
                <title>' . $this->getSubject() . '</title>
            </head>
            <body>
                <p> ' . $this->getBody() .  '</p>
            </body>
        </html>';
        mail($this->getEmailTo(), $this->getSubject(), $message, $headers);
    }
}