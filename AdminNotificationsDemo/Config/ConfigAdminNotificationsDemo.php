<?php

namespace AdminNotificationsDemo\Config;

use AdminNotificationsDemo\AdminActionsBaseDemo;
use OLOG\AdminLTE\LayoutAdminlte;
use OLOG\AdminNotifications\AdminNotificationConfig;
use OLOG\Auth\AuthConfig;
use OLOG\Auth\AuthConstants;
use OLOG\DB\DBConfig;
use OLOG\DB\DBSettings;
use OLOG\KeyValue\KeyValueConfig;
use OLOG\Layouts\LayoutsConfig;


class ConfigAdminNotificationsDemo
{
    public static function init()
    {
        AuthConfig::setFullAccessCookieName('bla');
        date_default_timezone_set('Europe/Moscow');

        DBConfig::setDBSettingsObj(
            AuthConstants::DB_NAME_PHPAUTH,
            new DBSettings('localhost', 'db_admin_notifications_demo', 'root', '1q2w3e4r5t', 'vendor/o-log/php-auth/db_phpauth.sql')
        );

        DBConfig::setDBSettingsObj(
            AdminNotificationConfig::ADMIN_NOTIFICATIONS_DB_NAME,
            new DBSettings('localhost','db_admin_notifications_demo', 'root', '1q2w3e4r5t', 'db_admin_notifications.sql')
        );
        DBConfig::setDBSettingsObj(
            KeyValueConfig::DB_ID,
            new DBSettings('localhost', 'db_admin_notifications_demo', 'root', '1q2w3e4r5t', 'vendor/o-log/php-keyvalue/db_keyvalue.sql')
        );

        AuthConfig::setAdminActionsBaseClassname(AdminActionsBaseDemo::class);
        KeyValueConfig::setAdminActionsBaseClassName(AdminActionsBaseDemo::class);

        AdminNotificationConfig::setAdminActionsBaseClassname(AdminActionsBaseDemo::class);
        AdminNotificationConfig::setAdminNotificationsKeyvalueKeyEmailList('notifi_email_list');
        AdminNotificationConfig::setEmailFrom('notifi<notifi@notifi.ru>');

        LayoutsConfig::setAdminLayoutClassName(LayoutAdminlte::class);
    }

}