<?php

/**
 * @var $conn
 */


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
$text_preview = $_REQUEST['text_preview'];
$text = $_REQUEST['text'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

if(is_uploaded_file($tmp_name)) {

    $file_name = basename($tmp_name);
    $dir_path = "$_SERVER[DOCUMENT_ROOT]/uploads/$file_name";

    $img = new Image();
    $img->uploadImageToDir(
        from: $tmp_name,
        to: $dir_path,
        permissions: 0777
    );

    $blog = new Blog(conn: $conn);
    $blog->updateBlogElement(
        id: $id,
        title: $title,
        alt: $alt,
        text: $text,
        text_preview: $text_preview,
        image: $img,
    );

    header("Location: /admin/update?id=$id");
}else{

    $blog = new Blog(conn: $conn);
    $blog->updateBlogElement(
        id: $id,
        title: $title,
        alt: $alt,
        text: $text,
        text_preview: $text_preview,
        image: false,
    );

    header("Location: /admin/update?id=$id");
}