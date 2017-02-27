<?php

namespace OLOG\AdminNotifications\AdminPages;
use OLOG\AdminNotifications\AdminNotification;
use OLOG\AdminNotifications\Permissions;
use OLOG\Auth\Auth;
use OLOG\Layouts\InterfaceMenu;
use OLOG\Layouts\MenuItem;

class AdminNotificationsAdminMenu implements InterfaceMenu
{
    static public function menuArr()
    {
        $menu_arr = [];

        if (Auth::currentUserHasAnyOfPermissions([Permissions::PERMISSION_ADMINNOTIFICATIONS_MANAGE])) {
//            $menu_arr[] = new MenuItem('Уведомления', '', [
//                new MenuItem('O_o', '', [], 'glyphicon glyphicon-user')
//            ], 'glyphicon glyphicon-log-in');

            $notify_count = count(AdminNotification::getIdsArrForStatusByCreatedAtDesc(0));

            $menu_arr[] =
                new MenuItem((new AdminNotificationsListAction())->pageTitle() . '('.$notify_count.')',(new AdminNotificationsListAction())->url(), [], 'glyphicon glyphicon-send');

        }

        return $menu_arr;
    }
}
{

}