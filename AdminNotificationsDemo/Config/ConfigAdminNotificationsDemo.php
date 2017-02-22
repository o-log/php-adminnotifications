<?php

namespace AdminNotificationsDemo\Config;

use OLOG\AdminNotifications\AdminNotificationConfig;
use OLOG\DB\DBConfig;
use OLOG\DB\DBSettings;

class ConfigAdminNotificationsDemo
{
    public static function init()
    {
        date_default_timezone_set('Europe/Moscow');
        DBConfig::setDBSettingsObj(
            AdminNotificationConfig::ADMIN_NOTIFICATIONS_DB_NAME,
            new DBSettings('localhost',AdminNotificationConfig::ADMIN_NOTIFICATIONS_DB_NAME, 'root', '1q2w3e4r5t', 'db_admin_notifications.sql')
        );
    }

}