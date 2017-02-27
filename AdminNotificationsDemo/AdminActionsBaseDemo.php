<?php

namespace AdminNotificationsDemo;

use OLOG\AdminNotifications\AdminPages\AdminNotificationsAdminMenu;
use OLOG\Auth\Admin\AuthAdminMenu;
use OLOG\Auth\Admin\CurrentUserNameTrait;
use OLOG\KeyValue\Admin\KeyValueAdminMenu;
use OLOG\Layouts\InterfaceCurrentUserName;
use OLOG\Layouts\InterfaceMenu;
use OLOG\Layouts\InterfaceSiteTitle;
use OLOG\Layouts\InterfaceTopActionObj;

class AdminActionsBaseDemo implements
    InterfaceMenu,
    InterfaceCurrentUserName,
    InterfaceSiteTitle,
    InterfaceTopActionObj
{
    use CurrentUserNameTrait;

    public function topActionObj()
    {
            return null;

    }

    public function siteTitle()
    {
        return 'Teleseries';
    }

    static public function menuArr()
    {
        $menu_arr = [];
        $menu_arr = array_merge($menu_arr, AuthAdminMenu::menuArr());
        $menu_arr = array_merge($menu_arr, KeyValueAdminMenu::menuArr());
        $menu_arr = array_merge($menu_arr, AdminNotificationsAdminMenu::menuArr());
        return $menu_arr;
    }
}
