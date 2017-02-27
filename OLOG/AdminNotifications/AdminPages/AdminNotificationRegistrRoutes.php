<?php


namespace OLOG\AdminNotifications\AdminPages;


class AdminNotificationRegistrRoutes
{
    static public function registr(){
        \OLOG\Router::processAction(AdminNotificationsListAction::class, 0);
    }
}