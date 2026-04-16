<?php

    $conn = mysqli_connect("localhost", "root", "", "barber_db");

    function query($query){
        global $conn;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahUser($data){
        global $conn;

        $nama_lengkap = $data['nama_lengkap'];
        $username = strtolower(stripslashes($data['username']));
        
        $query = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
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
        $query = "INSERT INTO users VALUES(NULL, ?, ?, ?, 'user')";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $password, $nama_lengkap);
        $stmt->execute();
        $_SESSION['success'] = "Akun Berhasil di Daftarkan! Silahkan Login.";
        return $stmt->affected_rows;
    }

    function login ($data){
        global $conn;

        $username = strtolower(stripslashes($data['username']));
        $password = $data['password'];

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $row['nama_lengkap'];
                $_SESSION['role'] = $row['role'];
                return true;
            }
        }
        $_SESSION['error'] = "Username atau Password Salah!";
        return false;
    }