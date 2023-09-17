<?php
ini_set('display_errors', E_ALL);
$title = $_REQUEST['title'];
$img_path = $_REQUEST['img_path'];
$alt = $_REQUEST['alt'];
$text = $_REQUEST['text'];

if(!empty($title) && !empty($img_path) && !empty($alt) && !empty($text)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $conn->query("insert into blog(title, img, img_alt, text)
values ('$title', '$img_path', '$alt', '$text')");
    header('Location: /blog');
}