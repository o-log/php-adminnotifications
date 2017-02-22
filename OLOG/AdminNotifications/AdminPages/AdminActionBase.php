<?php
namespace OLOG\AdminNotifications\AdminPages;

use OLOG\Auth\Admin\CurrentUserNameTrait;
use OLOG\Layouts\InterfaceCurrentUserName;
use OLOG\Layouts\InterfaceMenu;
use OLOG\Layouts\InterfaceSiteTitle;
use OLOG\Layouts\InterfaceTopActionObj;


class AdminActionBase implements
    InterfaceMenu,
    InterfaceCurrentUserName,
    InterfaceSiteTitle,
    InterfaceTopActionObj
{
    use CurrentUserNameTrait;

    public function topActionObj() {
        return null;
    }

    public function siteTitle() {
        return 'Admin Notifications';
    }

    static public function menuArr() {
        return AdminNotificationsAdminMenu::menuArr();
    }
}
