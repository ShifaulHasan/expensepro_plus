<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ExpensePro+</title>
<link rel="stylesheet" href="/expensepro_plus/assets/css/style.css">
</head>
<body>
<header>
  <nav>
    <a href="/expensepro_plus/index.php">Home</a>
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="/expensepro_plus/views/finance/dashboard.php">Dashboard</a>
      <a href="/expensepro_plus/views/finance/add_expense.php">Add Expense</a>
      <a href="/expensepro_plus/views/finance/add_income.php">Add Income</a>
      <a href="/expensepro_plus/views/finance/report.php">Report</a>
      <a href="/expensepro_plus/controllers/auth/logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username'] ?? '') ?>)</a>
    <?php else: ?>
      <a href="/expensepro_plus/views/auth/login.php">Login</a>
      <a href="/expensepro_plus/views/auth/register.php">Register</a>
    <?php endif; ?>
  </nav>
</header>
<main>
