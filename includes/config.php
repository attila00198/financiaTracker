<?php
define('DB_FILE', '../database/app.db');

// Adatbázis inicializálás
function init_db() {
    $db = new PDO('sqlite:' . DB_FILE);
    $db->exec('
        CREATE TABLE IF NOT EXISTS transactions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            amount REAL,
            type TEXT,
            description TEXT,
            date TEXT
        )
    ');
    return $db;
}