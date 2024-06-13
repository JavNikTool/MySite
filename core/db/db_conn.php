<?php

try {
    $conn = new PDO('pgsql:host=postgres-db;dbname=kremnevblog', 'javniktool', 'Tassadar321.');
} catch (PDOException $e) {
    echo "ошибка подключения к базе данных " . $e->getMessage();
}