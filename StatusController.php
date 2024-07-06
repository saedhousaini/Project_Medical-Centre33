<?php
namespace app\controllers;

require __DIR__.'/../models/StatusModel.php';
use app\models\StatusModel;

echo "Hello Status<br>";

class StatusController {
    private $model;

    public function __construct($db) {
        $this->model = new StatusModel($db);
    }
    
    private function jsonResponse($data) {
        header("Content-Type: application/json");
        echo json_encode($data);
        exit;
    }

    public function index() {
        $statuses = $this->model->getStatus();
        $this->jsonResponse($statuses);
    }

    public function getStatus($id) {
        $status = $this->model->getStatusById($id);
        $this->jsonResponse($status);
    }

    public function addStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description']
            ];
            $this->model->addStatus($data);
            $this->jsonResponse($data);
        }
    }
}
?>