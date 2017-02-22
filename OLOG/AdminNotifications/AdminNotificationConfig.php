<?php

namespace OLOG\AdminNotifications;

class AdminNotificationConfig
{
    const ADMIN_NOTIFICATIONS_DB_NAME='db_admin_notifications';

    static protected $admin_actions_base_classname;
    static protected $email_from;
    static protected $admin_notifications_keyvalue_key_email_list;

    /**
     * @return mixed
     */
    public static function getAdminNotificationsKeyvalueKeyEmailList()
    {
        return self::$admin_notifications_keyvalue_key_email_list;
    }

    /**
     * @param mixed $admin_notifications_keyvalue_key_email_list
     */
    public static function setAdminNotificationsKeyvalueKeyEmailList($admin_notifications_keyvalue_key_email_list)
    {
        self::$admin_notifications_keyvalue_key_email_list = $admin_notifications_keyvalue_key_email_list;
    }

    /**
     * @return mixed
     */
    public static function getEmailFrom()
    {
        return self::$email_from;
    }

    /**
     * @param mixed $email_from
     */
    public static function setEmailFrom($email_from)
    {
        self::$email_from = $email_from;
    }

    /**
     * @return mixed
     */
    public static function getAdminActionsBaseClassname()
    {
        return self::$admin_actions_base_classname;
    }

    /**
     * @param mixed $admin_actions_base_classname
     */
    public static function setAdminActionsBaseClassname($admin_actions_base_classname)
    {
        self::$admin_actions_base_classname = $admin_actions_base_classname;
    }

}