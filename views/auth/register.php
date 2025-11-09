<?php include __DIR__.'/../../controllers/auth/register.php'; ?>
<?php include __DIR__.'/../templates/header.php'; ?>

<h2>Register</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>".htmlspecialchars($error)."</p>"; ?>
<form method="post" action="">
  <label>Username</label><br>
  <input type="text" name="username" required><br>
  <label>Email</label><br>
  <input type="email" name="email" required><br>
  <label>Password</label><br>
  <input type="password" name="password" required><br>
  <label>Confirm Password</label><br>
  <input type="password" name="password_confirm" required><br>
  <button type="submit">Register</button>
</form>

<?php include __DIR__.'/../templates/footer.php'; ?>
