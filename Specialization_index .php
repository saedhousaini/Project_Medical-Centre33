<?php

use app\controllers\SpecializationController;

require_once DIR . '/config/config.php';
require_once DIR . '/lib/DB/MysqliDb.php';
require_once DIR . '/app/controllers/SpecializationController.php';


$config = require 'config/config.php';
$db = new MysqliDb (
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$request = $_SERVER['REQUEST_URI'];

define('BASE_PATH', '/specialization/');

$controller = new SpecializationController($db);

switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'add':
        $controller->addSpecialization();
        break;
    case BASE_PATH . 'show':
        $controller->showSpecializations();
        break;
    case BASE_PATH . 'delete?id=' . $_GET['id']:
        $controller->deleteSpecialization($_GET['id']);
        break;
    case BASE_PATH . 'update?id=' . $_GET['id']:
        $controller->updateSpecialization($_GET['id']);
        break;
}
?>