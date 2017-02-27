<?php


namespace OLOG\AdminNotifications;


use OLOG\AdminNotifications\AdminPages\AdminNotificationsListAction;

class RegistrRoutes
{
    static public function registerRoutes(){
        \OLOG\Router::processAction(AdminNotificationsListAction::class, 0);
    }
}