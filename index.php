<?php

require_once 'vendor\autoload.php';

session_start();

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$self = str_replace('index.php', '', $self);

$uri = str_replace($self, '', $uri);

$getParams = explode('?', $uri);

$uri = array_shift($getParams);

if(! empty($getParams)) {
    $getParams = $getParams[0];
    $getParams = explode('&', $getParams);
    foreach ($getParams as $key => $value) {
        parse_str($value, $arr);
        unset($getParams[$key]);
        $getParams[$key] = $arr;
    }
}

foreach ($getParams as $key => $value) {
    if (is_array($value)) {
        $temporaryKey = key($value);
        if (key_exists($temporaryKey, $getParams)) {
            $secondKey = key($value[$temporaryKey]);
            if (key_exists($secondKey, $getParams[$temporaryKey])) {
                $takeKey = key($value[$temporaryKey][$secondKey]);
                $getParams[$temporaryKey][$secondKey][$takeKey] = $value[$temporaryKey][$secondKey][$takeKey];
            } else {
                $getParams[$temporaryKey][$secondKey] = $value[$temporaryKey][$secondKey];
            }
        } else {
            $getParams[$temporaryKey] = $value[$temporaryKey];
        }
    }
    unset($getParams[$key]);
}


$args = explode('/', $uri);

$controllerName = array_shift($args);

$actionName = array_shift($args);

$dbInstanceName = 'default';

\StanimiraNikolova\Adapter\Database::setInstance(
    \StanimiraNikolova\Config\DbConfig::DB_HOST,
    \StanimiraNikolova\Config\DbConfig::DB_USER,
    \StanimiraNikolova\Config\DbConfig::DB_PASS,
    \StanimiraNikolova\Config\DbConfig::DB_NAME,
    $dbInstanceName
);
$controlerBigLetar = 'StanimiraNikolova\Controllers\\' . ucfirst($controllerName) . 'Controller';
if (class_exists($controlerBigLetar)) {
    $mvcContext = new \StanimiraNikolova\Core\MVC\MVCContext($controllerName, $actionName, $self, $args, $getParams);

    $app = new \StanimiraNikolova\Core\Application($mvcContext);

    $app->addClass(\StanimiraNikolova\Core\MVC\MVCContext::class, $mvcContext);
    $app->addClass(\StanimiraNikolova\Adapter\DatabaseInterface::class, \StanimiraNikolova\Adapter\Database::getInstance($dbInstanceName));
    $app->addClass(\StanimiraNikolova\Core\MVC\SessionInterface::class, new \StanimiraNikolova\Core\MVC\Session($_SESSION));

    $app->registerDependency(\StanimiraNikolova\Core\ViewInterface::class, \StanimiraNikolova\Core\View::class);
    $app->registerDependency(\StanimiraNikolova\Services\User\UserServiceInterface::class, \StanimiraNikolova\Services\User\UserService::class);
    $app->registerDependency(\StanimiraNikolova\Services\Application\EncryptionServiceInterface::class, \StanimiraNikolova\Services\Application\BCryptEncryptionService::class);
    $app->registerDependency(\StanimiraNikolova\Services\Application\AuthenticationServiceInterface::class, \StanimiraNikolova\Services\Application\AuthenticationService::class);
    $app->registerDependency(\StanimiraNikolova\Services\Application\ResponseServiceInterface::class, \StanimiraNikolova\Services\Application\ResponseService::class);
    $app->registerDependency(\StanimiraNikolova\Repositories\User\UserRepositoryInterface::class, \StanimiraNikolova\Repositories\User\UserRepository::class);
    $app->registerDependency(\StanimiraNikolova\Services\Menu\MenuServiceInterface::class, \StanimiraNikolova\Services\Menu\MenuService::class);
    $app->registerDependency(\StanimiraNikolova\Repositories\Menu\MenuRepositoryInterface::class, \StanimiraNikolova\Repositories\Menu\MenuRepository::class);
    $app->registerDependency(\StanimiraNikolova\Services\PageData\PageDataServiceInterface::class, \StanimiraNikolova\Services\PageData\PageDataService::class);
    $app->registerDependency(\StanimiraNikolova\Repositories\PageData\PageDataRepositoryInterface::class, \StanimiraNikolova\Repositories\PageData\PageDataRepository::class);

    try {
        $app->start();
    } catch (\Throwable $t) {
        echo $t->getMessage();
    }
}