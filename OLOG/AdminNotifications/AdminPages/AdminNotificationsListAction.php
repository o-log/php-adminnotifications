<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22.02.17
 * Time: 15:12
 */

namespace OLOG\AdminNotifications\AdminPages;


use AdminNotificationsDemo\Pages\Admin\AdminActionBase;
use OLOG\InterfaceAction;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;

class AdminNotificationsListAction extends AdminActionBase implements
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