<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '../..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

\AdminNotificationsDemo\Config\ConfigAdminNotificationsDemo::init();

\OLOG\EmailSender\EmailSender::sendEmails();
