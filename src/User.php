<?php

class User {
    private $db;
    private $table = "users";

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($data) {
        $nama_lengkap = $data['nama_lengkap'];
        $username = strtolower(stripslashes($data['username']));

        $query = "SELECT username FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $_SESSION['error'] = "Username Sudah Terdaftar!";
            return -1;
        }

        $password = $data['password'];
        $password2 = $data['password2'];

        if($password !== $password2){
            $_SESSION['error'] = "Konfirmasi password tidak sesuai!";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " VALUES(NULL, ?, ?, ?, 'user')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $username, $password, $nama_lengkap);
        $stmt->execute();
        $_SESSION['success'] = "Akun Berhasil di Daftarkan! Silahkan Login.";
        return $stmt->affected_rows;
    }

    public function login($data) {
        $username = strtolower(stripslashes($data['username']));
        $password = $data['password'];

        $query = "SELECT * FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        $_SESSION['error'] = "Username atau Password Salah!";
        return false;
    }

    public function logout() {
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
}