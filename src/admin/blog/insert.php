<?php

/**
 * @var $conn
 */


session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}
require_once 'vendor/autoload.php';

use core\image\Image;
use core\components\blog\Blog;

ini_set('display_errors', E_ALL);


$title = $_REQUEST['title'];
$tmp_name = $_FILES['img_path']['tmp_name'];
$alt = $_REQUEST['alt'];
$text = $_REQUEST['text'];

if(is_uploaded_file($tmp_name) && !empty($title) && !empty($alt) && !empty($text)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $file_name = basename($tmp_name);
    $dir_path = "$_SERVER[DOCUMENT_ROOT]/uploads/$file_name";

    $img = new Image();
    $img->uploadImageToDir(
        from: $tmp_name,
        to: $dir_path,
        permissions: 0777
    );

    $blog = new Blog(conn: $conn);
    $blog->insertBlogElement(
        title: $title,
        alt: $alt,
        text: $text,
        image: $img
    );

    header('Location: /admin/blog');
}else{
    header('Location: /admin/blog');
}