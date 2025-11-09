<?php
session_start();
require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/UserModel.php';

$userModel = new UserModel($conn);
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please Enter Every Field";
    } elseif ($password !== $password_confirm) {
        $error = "password doesnot match";
    } else {
        
        if ($userModel->getUserByEmail($email)) {
            $error = "same email is not valid";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $ok = $userModel->createUser($username, $email, $hash);
            if ($ok) {
                header("Location: /expensepro_plus/views/auth/login.php");
                exit;
            } else {
                $error = "Register problem";
            }
        }
    }
}
