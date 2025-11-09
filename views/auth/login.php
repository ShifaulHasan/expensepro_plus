<?php include __DIR__.'/../../controllers/auth/login.php'; ?>
<?php include __DIR__.'/../templates/header.php'; ?>

<h2>Login</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>".htmlspecialchars($error)."</p>"; ?>
<form method="post" action="">
  <label>Email</label><br>
  <input type="email" name="email" required><br>
  <label>Password</label><br>
  <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>

<?php include __DIR__.'/../templates/footer.php'; ?>
