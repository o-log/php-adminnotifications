<?php
require_once '../vendor/autoload.php';


\DEMOEmailAuth\Config\AuthDemoConfig::init();

\OLOG\Emailauth\RegisterRoutes::registerRoutes();

\OLOG\Router::processAction(\DEMOEmailAuth\Pages\MainPageAction::class, 0); //Pages\MainPageAction::class, 0);
\OLOG\Router::processAction(\DEMOEmailAuth\Pages\RegistrationPageAction::class, 0); //Pages\MainPageAction::class, 0);
\OLOG\Router::processAction(\DEMOEmailAuth\Pages\PasswordRecoveryPageAction::class, 0); //Pages\MainPageAction::class, 0);


