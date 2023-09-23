<?php

session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

ini_set('display_errors', E_ALL);

$title = $_REQUEST['title'];
$tmp_name = $_FILES['img_path']['tmp_name'];
$alt = $_REQUEST['alt'];
$text = $_REQUEST['text'];

if(is_uploaded_file($tmp_name) && !empty($title) && !empty($alt) && !empty($text)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $file_name = basename($tmp_name);

    $dir_path = "$_SERVER[DOCUMENT_ROOT]/uploads/$file_name";
    mkdir("$dir_path", 0777);

    $img_path = "$dir_path/$file_name";
    move_uploaded_file($tmp_name, "$img_path");

    $img_path = substr("$img_path",strpos("$img_path", '/uploads'));

    $conn->query("insert into blog(title, img, img_alt, text)
values ('$title', '$img_path', '$alt', '$text')");

    header('Location: /admin/blog');
}else{
    header('Location: /admin/blog');
}