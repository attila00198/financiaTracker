<?php
require_once 'config.php';

function get_transactions() {
    $db = init_db();
    $results = $db->query('SELECT * FROM transactions');
    
    $transactions = [];
    while ($row = $results->fetchAll(PDO::FETCH_ASSOC)) {
        $transactions[] = $row;
    }
    return $transactions;
}

function add_transaction($amount, $type, $description, $date) {
    $db = init_db();
    $stmt = $db->prepare('
        INSERT INTO transactions (amount, type, description, date)
        VALUES (:amount, :type, :description, :date)
    ');
    
    $stmt->bindValue(':amount', $amount, SQLITE3_FLOAT);
    $stmt->bindValue(':type', $type, SQLITE3_TEXT);
    $stmt->bindValue(':description', $description, SQLITE3_TEXT);
    $stmt->bindValue(':date', $date, SQLITE3_TEXT);
    
    return $stmt->execute();
}