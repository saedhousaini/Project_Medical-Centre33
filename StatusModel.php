<?php
namespace app\models;

class StatusModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
 
    public function getStatus() {
         return $this->db->get('status');
    }

    public function getStatusById($id) {
         return $this->db->where('id', $id)->getOne('status');
    }

    public function addStatus($data) {
         return $this->db->insert('status', $data);
    }
}
?>