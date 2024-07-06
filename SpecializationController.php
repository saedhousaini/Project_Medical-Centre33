<?php
namespace app\controllers;

require __DIR__.'/../models/SpecializationModel.php';
use app\models\SpecializationModel;

echo "Hello Specialization<br>";

class SpecializationController {
    private $model;

    public function __construct($db) {
        $this->model = new SpecializationModel($db);
    }

    private function jsonResponse($data) {
        header("Content-Type: application/json");
        echo json_encode($data);
        exit;
    }

    public function index() {
        $specializations = $this->model->getSpecializations();
        $this->jsonResponse($specializations);
    }

    public function addSpecialization() {
        $name = $_POST['name'];
        $data = [
            'name' => $name
        ];
        $this->model->addSpecialization($data); 
        $this->jsonResponse($data);   
    }

    public function showSpecializations() {
        $specializations = $this->model->getSpecializations();
        $this->jsonResponse($specializations);
    }

    public function deleteSpecialization($id) {
        $this->model->deleteSpecialization($id);
        $this->jsonResponse(['id' => $id]); 
    }

    public function updateSpecialization($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $data = [
                'name' => $name
            ];
            $this->model->updateSpecialization($id, $data);
            $this->jsonResponse($data);
        } else {
            $specialization = $this->model->getSpecializationById($id);
            $this->jsonResponse($specialization);
        }
    }
}
?>