<?php
namespace OLOG\AdminNotifications;

use OLOG\Assert;
use OLOG\EmailSender\Email;
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
    public function getVocabularyId(){
        return 1;
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
        $this->removeFromFactoryCache();
        $email_list_str = KeyValue::getOptionalValueForKey( AdminNotificationConfig::getAdminNotificationsKeyvalueKeyEmailList());
        Assert::assert($email_list_str,'Пустой список рассылки');
        $email_list = explode(',',$email_list_str);
        foreach ($email_list as $email){
            $email_obj = new Email();
            $email_obj->setBody($this->getMessage());
            $email_obj->setEmailTo($email);
            $email_obj->setEmailFrom( AdminNotificationConfig::getEmailFrom() );
            $email_obj->save();
        }
    }

}