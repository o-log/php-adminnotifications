<?php
namespace OLOG\AdminNotifications;

use OLOG\Assert;
use OLOG\KeyValue\KeyValue;
use OLOG\Model\ActiveRecordTrait;
use OLOG\Model\FactoryTrait;
use OLOG\Model\InterfaceDelete;
use OLOG\Model\InterfaceFactory;
use OLOG\Model\InterfaceLoad;
use OLOG\Model\InterfaceSave;
use OLOG\Model\ProtectPropertiesTrait;

class AdminNotification implements
    InterfaceFactory,
    InterfaceLoad,
    InterfaceSave,
    InterfaceDelete
{
    use FactoryTrait;
    use ActiveRecordTrait;
    use ProtectPropertiesTrait;

    const DB_ID = 'db_admin_notifications';
    const DB_TABLE_NAME = 'olog_adminnotifications_adminnotification';

    const _ID = 'id';
    const _CREATED_AT_TS = 'created_at_ts';
    
    const _MESSAGE = 'message';
    protected $message;
    const _STATUS = 'status';
    protected $status = 0;
    protected $id;

    static public function getIdsArrForStatusByCreatedAtDesc($value, $offset = 0, $page_size = 30){
        if (is_null($value)) {
            return \OLOG\DB\DBWrapper::readColumn(
                self::DB_ID,
                'select id from ' . self::DB_TABLE_NAME . ' where ' . self::_STATUS . ' is null order by created_at_ts desc limit ' . intval($page_size) . ' offset ' . intval($offset)
            );
        } else {
            return \OLOG\DB\DBWrapper::readColumn(
                self::DB_ID,
                'select id from ' . self::DB_TABLE_NAME . ' where ' . self::_STATUS . ' = ? order by created_at_ts desc limit ' . intval($page_size) . ' offset ' . intval($offset),
                array($value)
            );
        }
    }


    public function getStatus(){
        return $this->status;
    }

    public function setStatus($value){
        $this->status = $value;
    }



    public function getMessage(){
        return $this->message;
    }

    public function setMessage($value){
        $this->message = $value;
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

    public function afterSave()
    {
        $email_list = KeyValue::getOptionalValueForKey( AdminNotificationConfig::ADMIN_NOTIFICATIONS_KEYVALUE_KEY_EMAIL_LIST, []);
        Assert::assert(count($email_list)>0,'Пустой список рассылки');
        foreach ($email_list as $email){
            self::sendMail($email, $this->getMessage());
        }
    }

    public static function sendMail($email, $message){
        $subject='Уведомление';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . AdminNotificationConfig::getEmailFrom() . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $message = '
        <html>
            <head>
                <title>' . $subject . '</title>
            </head>
            <body>
                <p> ' . $message .  '</p>
            </body>
        </html>';
        mail($email, $subject, $message, $headers);
    }
}