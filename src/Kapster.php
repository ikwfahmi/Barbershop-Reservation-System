<?php

class Kapster {
    private $db;
    private $table = 'kapster';

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert_data($data) {
        $nama = $_POST['nama_kapster'];
        $foto = $this->upload();
        
        $query = "INSERT INTO " . $this->table . "(nama_kapster, foto) VALUES(?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $nama, $foto);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function upload() {
        $fileName = $_FILES['foto']['name'];
        $size = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        if($error === 4) {
            $fileName = 'default.png';
            return $fileName;
        }

        $extensionValid = ['jpg', 'jpeg', 'png'];
        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));
        
        if(!in_array($extension, $extensionValid)){
            return false;
        }
        
        $maksFile = 2 * 1024 * 1024;
        if($size > $maksFile){
            return false;
        }

        $newFile = uniqid();
        $newFile .= '.';
        $newFile .= $extension;
        
        move_uploaded_file($tmpName, 'public/img/' . $newFile);
        return $newFile; 
    }

    public function update_data(){

    }

    public function getKapster($id){
        $query = "SELECT * FROM " . $this->table . "WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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