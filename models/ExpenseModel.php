<?php

class ExpenseModel {
    private $conn;
    public function __construct($db_conn){ $this->conn = $db_conn; }

    public function addExpense($user_id, $title, $category, $amount, $date) {
        $stmt = $this->conn->prepare("INSERT INTO expenses (user_id, title, category, amount, expense_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issds", $user_id, $title, $category, $amount, $date);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function getExpensesByUser($user_id, $limit = 100) {
        $stmt = $this->conn->prepare("SELECT * FROM expenses WHERE user_id = ? ORDER BY expense_date DESC LIMIT ?");
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $res;
    }

    public function deleteExpense($id, $user_id) {
        $stmt = $this->conn->prepare("DELETE FROM expenses WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function getSumByDateRange($user_id, $start_date, $end_date) {
        $stmt = $this->conn->prepare("SELECT SUM(amount) as total FROM expenses WHERE user_id = ? AND expense_date BETWEEN ? AND ?");
        $stmt->bind_param("iss", $user_id, $start_date, $end_date);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $res['total'] ?? 0;
    }

    
    public function getCategorySummary($user_id, $start_date, $end_date) {
        $stmt = $this->conn->prepare("SELECT category, SUM(amount) as total FROM expenses WHERE user_id = ? AND expense_date BETWEEN ? AND ? GROUP BY category");
        $stmt->bind_param("iss", $user_id, $start_date, $end_date);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $rows;
    }
}
