<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ExpensePro+</title>
  <link rel="stylesheet" href="/expensepro_plus/assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
  <?php include __DIR__ . '/views/templates/header.php'; ?>
  <div class="container">
    <h1>Welcome to ExpensePro+</h1>
    <p>Simple Income & Expense manager.</p>
    <?php if(!isset($_SESSION['user_id'])): ?>
      <a href="/expensepro_plus/views/auth/login.php">Login</a> |
      <a href="/expensepro_plus/views/auth/register.php">Register</a>
    <?php else: ?>
      <a href="/expensepro_plus/views/finance/dashboard.php">Go to Dashboard</a>
    <?php endif; ?>
  </div>
  <?php include __DIR__ . '/views/templates/footer.php'; ?>
</body>
</html>
