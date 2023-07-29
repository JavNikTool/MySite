<?php
try {
    $conn = new PDO('pgsql:host=localhost;dbname=s1', 'javniktool', 'dbtest');
}catch (PDOException $e){
    echo "ошибка подключения к базе данных " . $e->getMessage();
}
