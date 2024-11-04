<?php

require_once '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = init_db();
    $db->exec('DELETE FROM transactions');

    echo json_encode(['status' => 'success']);
}
