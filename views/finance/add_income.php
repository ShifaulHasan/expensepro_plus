<?php include __DIR__.'/../../controllers/finance/add_income.php'; ?>
<?php include __DIR__.'/../templates/header.php'; ?>

<h2>Add Income</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>".htmlspecialchars($error)."</p>"; ?>
<?php if(!empty($success)) echo "<p style='color:green;'>".htmlspecialchars($success)."</p>"; ?>

<form method="post" action="">
  <label>Source</label><br>
  <input type="text" name="source" required><br>
  <label>Amount</label><br>
  <input type="number" step="0.01" name="amount" required><br>
  <label>Date</label><br>
  <input type="date" name="date" value="<?= date('Y-m-d') ?>" required><br>
  <button type="submit">Add Income</button>
</form>

<?php include __DIR__.'/../templates/footer.php'; ?>
