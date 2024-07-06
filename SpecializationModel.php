<?php
namespace app\models;

class SpecializationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getSpecializations() {
        return $this->db->get('specializations');
    }

    public function getSpecializationById($id) {
        return $this->db->where('id', $id)->getOne('specializations');
    }

    public function addSpecialization($data) {
        return $this->db->insert('specializations', $data);
    }

    public function updateSpecialization($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('specializations', $data);
    }

    public function deleteSpecialization($id) {
        $this->db->where('id', $id);
        return $this->db->delete('specializations');
    }
}
?>