<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

ini_set('display_errors', E_ALL);

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$img_path = $_REQUEST['img_path'];
$alt = $_REQUEST['alt'];
$text = $_REQUEST['text'];

if(!empty($title) && !empty($img_path) && !empty($alt) && !empty($text)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $conn->query("update blog set title = '$title', img = '$img_path', img_alt = '$alt', text = '$text' where id = $id");

    header("Location: /admin/update?id=$id");
}