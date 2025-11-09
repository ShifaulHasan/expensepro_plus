<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /expensepro_plus/views/auth/login.php");
    exit;
}

require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/ExpenseModel.php';

$expenseModel = new ExpenseModel($conn);
$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $amount = floatval($_POST['amount']);
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    if (empty($title) || $amount <= 0 || empty($date)) {
        $error = "Provide correct info";
    } else {
        $ok = $expenseModel->addExpense($user_id, $title, $category, $amount, $date);
        if ($ok) $success = "Expense Added";
        else $error = "Expense Added problem Occur";
    }
}
