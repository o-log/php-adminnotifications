<?php

use OLOG\DB\DBConfig;
use OLOG\DB\DBSettings;
use \OLOG\Auth\AuthConstants;

class ConfigAdminNotificationsDemo
{
    public static function init()
    {
        date_default_timezone_set('Europe/Moscow');
        DBConfig::setDBSettingsObj(
            AuthConstants::DB_NAME_PHPAUTH,
            new DBSettings('localhost', \OLOG\AdminNotifications\AdminNotificationConfig::ADMIN_NOTIFICATIONS_DB_NAME, 'root', '1', 'vendor/o-log/php-auth/db_phpauth.sql')
        );
    }

}