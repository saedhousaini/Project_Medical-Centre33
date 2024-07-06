<?php

use app\controllers\StatusController;

require_once DIR . '/config/config.php';
require_once DIR . '/lib/DB/MysqliDb.php';
require_once DIR . '/app/controllers/StatusController.php';

$config = require 'config/config.php';
$db = new MysqliDb (
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$request = $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/status/');

$controller = new StatusController($db);

switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;
    case BASE_PATH . 'get':
        $controller->getStatus($_GET['id']);
        break;
    case BASE_PATH . 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->addStatus();
        }
        break;
}
?>