<?php
require_once '../vendor/autoload.php';

\AdminNotificationsDemo\Config\ConfigAdminNotificationsDemo::init();

\OLOG\Auth\RegisterRoutes::registerRoutes();
\OLOG\KeyValue\RegisterRoutes::registerRoutes();
\OLOG\AdminNotifications\RegisterRoutes::registerRoutes();

\OLOG\Redirects::redirect( (new \OLOG\AdminNotifications\AdminPages\AdminNotificationsListAction())->url() );




