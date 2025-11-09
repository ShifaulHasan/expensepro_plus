<?php include __DIR__.'/../../controllers/finance/generate_report.php'; ?>
<?php include __DIR__.'/../templates/header.php'; ?>

<h2>Dashboard</h2>
<p>Report for: <?= htmlspecialchars($start) ?> to <?= htmlspecialchars($end) ?></p>

<div>
  <strong>Total Income:</strong> <?= number_format($total_incomes,2) ?><br>
  <strong>Total Expense:</strong> <?= number_format($total_expenses,2) ?><br>
  <strong>Net:</strong> <?= number_format($total_incomes - $total_expenses,2) ?>
</div>

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

<h3>Recent Expenses</h3>
<?php
require_once __DIR__ . '/../../models/ExpenseModel.php';
$expenseModel = new ExpenseModel($conn);
$recent = $expenseModel->getExpensesByUser($_SESSION['user_id'], 10);
?>
<table>
  <tr><th>Title</th><th>Category</th><th>Amount</th><th>Date</th><th>Action</th></tr>
  <?php foreach($recent as $r): ?>
    <tr>
      <td><?= htmlspecialchars($r['title']) ?></td>
      <td><?= htmlspecialchars($r['category']) ?></td>
      <td><?= number_format($r['amount'],2) ?></td>
      <td><?= htmlspecialchars($r['expense_date']) ?></td>
      <td>
        <form method="post" action="/expensepro_plus/controllers/finance/delete_entry.php" style="display:inline">
          <input type="hidden" name="type" value="expense">
          <input type="hidden" name="id" value="<?= intval($r['id']) ?>">
          <button type="submit" onclick="return confirm('সচেতন? মুছে ফেলতে চান?')">Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php include __DIR__.'/../templates/footer.php'; ?>
