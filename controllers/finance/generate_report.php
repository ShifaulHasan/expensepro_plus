<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /expensepro_plus/views/auth/login.php");
    exit;
}

require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/ExpenseModel.php';
require_once __DIR__ . '/../../models/IncomeModel.php';

$expenseModel = new ExpenseModel($conn);
$incomeModel  = new IncomeModel($conn);

$user_id = $_SESSION['user_id'];

$start = $_GET['start'] ?? date('Y-m-01'); 
$end   = $_GET['end']   ?? date('Y-m-t');  

$total_expenses = $expenseModel->getSumByDateRange($user_id, $start, $end);
$total_incomes  = $incomeModel->getSumByDateRange($user_id, $start, $end);
$category_summary = $expenseModel->getCategorySummary($user_id, $start, $end);
