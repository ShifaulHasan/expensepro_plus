<?php
// controllers/finance/add_income.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /expensepro_plus/views/auth/login.php");
    exit;
}

require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/IncomeModel.php';

$incomeModel = new IncomeModel($conn);
$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $source = trim($_POST['source']);
    $amount = floatval($_POST['amount']);
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    if (empty($source) || $amount <= 0 || empty($date)) {
        $error = "Provide correct information";
    } else {
        $ok = $incomeModel->addIncome($user_id, $source, $amount, $date);
        if ($ok) $success = "Income Added";
        else $error = "Income Added Problem Occur";
    }
}
