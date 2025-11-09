<?php
class UserModel {
    private $conn;
    public function __construct($db_conn) { $this->conn = $db_conn; }

    public function createUser($username, $email, $password_hash) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password_hash);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user ?: null;
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT id, username, email FROM users WHERE id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $res ?: null;
    }
}
