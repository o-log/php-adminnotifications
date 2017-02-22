<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22.02.17
 * Time: 15:36
 */

namespace OLOG\AdminNotifications\AdminPages;


class AdminNotificationRegistrRoutes
{
    static public function registr(){
        \OLOG\Router::processAction(AdminNotificationsListAction::class, 0);
        \OLOG\Router::processAction(AdminNotificationEditAction::class, 0);
    }
}