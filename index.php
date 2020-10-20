<?php
define('_DS_', DIRECTORY_SEPARATOR);
define('_ROOT_', realpath(dirname(__FILE__)) . _DS_);
define('URL', 'http://localhost/controlmaster/');
require_once 'Core/Autoload.php';
\Core\Autoload::Run();
\Core\Router::Run(new \Core\Request());
