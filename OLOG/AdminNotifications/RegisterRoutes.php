<?php


namespace OLOG\AdminNotifications;


use OLOG\AdminNotifications\AdminPages\AdminNotificationsListAction;

class RegisterRoutes
{
    static public function registerRoutes(){
        \OLOG\Router::processAction(AdminNotificationsListAction::class, 0);
    }
}