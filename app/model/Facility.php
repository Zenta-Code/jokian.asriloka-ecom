<?php
class Facility
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getFacility()
    {
        $q = 'SELECT * FROM facility';
        $this->db->query($q);
        $res = $this->db->resultSet();
        return $res;
    }

    public function getFacilityById($id)
    {
        $q = 'SELECT * FROM facility WHERE id = ?';
        $this->db->query($q);
        $this->db->bind(1, $id);
        $res = $this->db->resultSet();
        return $res;
    }
}