<?php include __DIR__.'/../../controllers/finance/generate_report.php'; ?>
<?php include __DIR__.'/../templates/header.php'; ?>

<h2>Generate Report</h2>
<form method="get" action="">
  <label>Start</label>
  <input type="date" name="start" value="<?= htmlspecialchars($start) ?>">
  <label>End</label>
  <input type="date" name="end" value="<?= htmlspecialchars($end) ?>">
  <button type="submit">View</button>
</form>

<p>Total Income: <?= number_format($total_incomes,2) ?></p>
<p>Total Expense: <?= number_format($total_expenses,2) ?></p>

<h3>Category Summary</h3>
<table>
  <tr><th>Category</th><th>Total</th></tr>
  <?php foreach($category_summary as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['category']) ?></td>
      <td><?= number_format($row['total'],2) ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include __DIR__.'/../templates/footer.php'; ?>
