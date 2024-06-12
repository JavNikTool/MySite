<?php

try {
    $conn = new PDO('pgsql:host=127.0.0.1;dbname=kremnevblog', 'javniktool', 'Tassadar321.');
} catch (PDOException $e) {
    echo "ошибка подключения к базе данных " . $e->getMessage();
}