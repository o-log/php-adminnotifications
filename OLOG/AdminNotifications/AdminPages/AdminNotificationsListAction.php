<?php

namespace OLOG\AdminNotifications\AdminPages;


use OLOG\AdminNotifications\AdminNotification;
use OLOG\AdminNotifications\Permissions;
use OLOG\Auth\Operator;
use OLOG\CRUD\CRUDForm;
use OLOG\CRUD\CRUDFormRow;
use OLOG\CRUD\CRUDFormWidgetTextarea;
use OLOG\CRUD\CRUDTableWidgetOptionsEditor;
use OLOG\Exits;
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
        Exits::exit403If(
            !Operator::currentOperatorHasAnyOfPermissions([Permissions::PERMISSION_ADMINNOTIFICATIONS_MANAGE])
        );

        $html = \OLOG\CRUD\CRUDTable::html(
            AdminNotification::class,
            CRUDForm::html(
                new AdminNotification(),
                [
                    new CRUDFormRow('Сообщение', new CRUDFormWidgetTextarea( AdminNotification::_MESSAGE))
                ],
                $this->url()
            ),
            [
                new \OLOG\CRUD\CRUDTableColumn(
                    'Сообщение',
                    new \OLOG\CRUD\CRUDTableWidgetText('{this->' . AdminNotification::_MESSAGE .'}')
                ),
                new \OLOG\CRUD\CRUDTableColumn(
                    'Статус',
                    new CRUDTableWidgetOptionsEditor( AdminNotification::_STATUS ,[0=>'не прочитано',1=>'прочитано'], '1qqq')
                ),

            ],
            [
                //new CRUDTableFilterLikeInline('login_1287318', '', 'login', 'Логин'),
                //new CRUDTableFilterLikeInline('description_1287318', '', 'description', 'Комментарий'),
                //new \OLOG\Auth\CRUDTableFilterOwnerInvisible()
            ],
            'id',
            '1qqq',
            \OLOG\CRUD\CRUDTable::FILTERS_POSITION_INLINE
        );

        AdminLayoutSelector::render($html, $this);
    }

}