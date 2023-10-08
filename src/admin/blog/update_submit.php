<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

ini_set('display_errors', E_ALL);

require_once 'vendor/autoload.php';

use core\image\Image;
use core\components\blog\Blog;

$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$tmp_name = $_FILES['img_path']['tmp_name'];
$alt = $_REQUEST['alt'];
$text = $_REQUEST['text'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

if(is_uploaded_file($tmp_name)) {
    $file_name = basename($tmp_name);

    $dir_path = "$_SERVER[DOCUMENT_ROOT]/uploads/$file_name";
    mkdir("$dir_path", 0777);

    $img_path = "$dir_path/$file_name";
    move_uploaded_file($tmp_name, "$img_path");

    $img_path = substr("$img_path",strpos("$img_path", '/uploads'));

    $sth = $conn->prepare("update blog set title = :title, img = :img, img_alt = :alt, text = :text where id = :id");
    $sth->execute([
        'title' => $title,
        'img' => $img_path,
        'alt' => $alt,
        'text' => $text,
        'id' => $id
    ]);

    header("Location: /admin/update?id=$id");
}else{
    $sth = $conn->prepare("update blog set title = :title, img_alt = :alt, text = :text where id = :id");
    $sth->execute([
        'title' => $title,
        'alt' => $alt,
        'text' => $text,
        'id' => $id
    ]);

    header("Location: /admin/update?id=$id");
}