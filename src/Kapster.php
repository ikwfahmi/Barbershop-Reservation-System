<?php

class Kapster {
    private $db;
    private $table = 'kapster';

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllKapsters() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->db->query($query);
        $kapsters = [];
        while ($row = $result->fetch_assoc()) {
            $kapsters[] = $row;
        }
        return $kapsters;
    }
}