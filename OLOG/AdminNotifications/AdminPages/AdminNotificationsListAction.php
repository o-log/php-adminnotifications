<?php

namespace OLOG\AdminNotifications\AdminPages;


use OLOG\InterfaceAction;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;

class AdminNotificationsListAction extends AdminNotificationsAdminActionsBaseProxy implements
    InterfaceAction,
    InterfacePageTitle

{
    public function url()
    {
            return '/admin/notifications/list';
    }

    public function pageTitle()
    {
        return 'Уведомления';
    }

    public function action()
    {

        AdminLayoutSelector::render('');
    }

}