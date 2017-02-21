<?php

namespace OLOG\AdminNotifications;

class AdminNotificationConfig
{
    const ADMIN_NOTIFICATIONS_DB_NAME=' db_admin_notifications';
    static protected $admin_actions_base_classname;

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