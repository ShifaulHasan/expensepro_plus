<?php
// controllers/finance/delete_entry.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /expensepro_plus/views/auth/login.php");
    exit;
}
require_once __DIR__ . '/../../config/db_connect.php';
require_once __DIR__ . '/../../models/ExpenseModel.php';
require_once __DIR__ . '/../../models/IncomeModel.php';

$expenseModel = new ExpenseModel($conn);
$incomeModel = new IncomeModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type']; 
    $id = intval($_POST['id']);
    $user_id = $_SESSION['user_id'];

    if ($type === 'expense') {
        $res = $expenseModel->deleteExpense($id, $user_id);
    } else {
        
        $stmt = $conn->prepare("DELETE FROM incomes WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id);
        $res = $stmt->execute();
        $stmt->close();
    }
    header("Location: /expensepro_plus/views/finance/dashboard.php");
    exit;
}
