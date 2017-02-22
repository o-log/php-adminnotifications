<?php

namespace OLOG\AdminNotifications\AdminPages;


use OLOG\AdminNotifications\AdminNotification;
use OLOG\AdminNotifications\Permissions;
use OLOG\Auth\Operator;
use OLOG\CRUD\CRUDForm;
use OLOG\CRUD\CRUDFormRow;
use OLOG\CRUD\CRUDFormWidgetTextarea;
use OLOG\Exits;
use OLOG\InterfaceAction;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\InterfacePageTitle;

class AdminNotificationEditAction extends AdminNotificationsAdminActionsBaseProxy implements
    InterfaceAction,
    InterfacePageTitle

{
    private $notification_id;
    public function url()
    {
        return '/admin/notifications/' . $this->notification_id;
    }

    static public function urlMask(){
        return '/admin/notifications/(\d+)';
    }

    public function __construct($notification_id)
    {
        $this->notification_id = $notification_id;
    }

    public function pageTitle()
    {
        return 'Уведомлениe ' . $this->notification_id;
    }

    public function action()
    {
        Exits::exit403If(
            !Operator::currentOperatorHasAnyOfPermissions([Permissions::PERMISSION_ADMINNOTIFICATIONS_MANAGE])
        );

        AdminLayoutSelector::render($html, $this);
    }

}