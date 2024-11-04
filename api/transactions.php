<?php
require_once '../includes/config.php';

function get_transactions()
{
    $db = init_db();
    $results = $db->query('SELECT * FROM transactions');

    $transactions = [];
    while ($row = $results->fetchAll(PDO::FETCH_ASSOC)) {
        $transactions += $row;
    }
    return $transactions;
}

function add_transaction($amount, $type, $description, $date)
{
    $db = init_db();
    $stmt = $db->prepare('
        INSERT INTO transactions (amount, type, description, date)
        VALUES (:amount, :type, :description, :date)
    ');

    $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);

    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];

    // Használj $_POST változót, ha `application/x-www-form-urlencoded`-ként küldesz adatokat
    if (!empty($_POST)) {
        $data = $_POST;
    } else {
        // Ha JSON formátumot használsz, olvasd be a nyers adatokat
        $data = json_decode(file_get_contents('php://input'), true);
    }

    if ($data) {
        $amount = $data['amount'];
        $type = $data['type'];
        $description = $data['description'];
        $date = $data['date'];

        add_transaction($amount, $type, $description, $date);

        // Térj vissza a kapott adatokkal
        header('Content-Type: application/json');

        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nincs adat']);
    }
} else {
    header('Content-Type: application/json');
    $transactions = get_transactions();
    echo json_encode($transactions);
}
