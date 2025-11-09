<?php
class IncomeModel {
    private $conn;
    public function __construct($db_conn){ $this->conn = $db_conn; }

    public function addIncome($user_id, $source, $amount, $date) {
        $stmt = $this->conn->prepare("INSERT INTO incomes (user_id, source, amount, income_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $source, $amount, $date);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }

    public function getIncomesByUser($user_id, $limit = 100) {
        $stmt = $this->conn->prepare("SELECT * FROM incomes WHERE user_id = ? ORDER BY income_date DESC LIMIT ?");
        $stmt->bind_param("ii", $user_id, $limit);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $res;
    }

    public function getSumByDateRange($user_id, $start_date, $end_date) {
        $stmt = $this->conn->prepare("SELECT SUM(amount) as total FROM incomes WHERE user_id = ? AND income_date BETWEEN ? AND ?");
        $stmt->bind_param("iss", $user_id, $start_date, $end_date);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $res['total'] ?? 0;
    }
}
