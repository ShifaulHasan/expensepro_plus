<?php
session_start();
require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/UserModel.php';

$userModel = new UserModel($conn);
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $user = $userModel->getUserByEmail($email);
    if (!$user) {
        $error = "No Email Found";
    } elseif (!password_verify($password, $user['password'])) {
        $error = "Wrong Password";
    } else {
        
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: /expensepro_plus/views/finance/dashboard.php");
        exit;
    }
}
