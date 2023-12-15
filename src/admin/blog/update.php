<?php


session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

require_once 'vendor/autoload.php';

use core\components\blog\Blog;

ini_set('display_errors', E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>update</title>
</head>
<body>
<?php

$id = $_REQUEST['id'];

if (!empty($id)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
    /**
     * @var $conn
     * @var $settings
     */
    $blog = new Blog($conn);
    $res = $blog->getBlogElementById($id);
} else {
    header('Location: /admin/blog');
}

?>
<?php if ($res) : ?>
    <div class="container">
        <div class="admin_blog_wrap">
            <div class="admin_blog_insert_wrap">
                <form enctype="multipart/form-data" action="/admin/update_submit" method="post" class="update_submit">
                    Название поста <br> <input type="text" name="title" id="" value="<?= $res['title'] ?>"><br>
                    Путь к картинке <br> <input type="file" name="img_path" id=""><br>
                    текста анонса <br> <input type="text" name="text_preview" id="" value="<?= $res['text_preview'] ?>"><br>
                    тег alt картинки <br> <input type="text" name="alt" id="" value="<?= $res['img_alt'] ?>"><br>
                    текст <br> <textarea name="text" class="tinymce_textarea"><?= $res['text'] ?></textarea><br><br>
                    <input type="hidden" name="id" value="<?= $res['id'] ?>">

                    <input type="submit" value="Изменить"> <br><br>
                    <a class="adm_update_back_btn" href="/admin/blog">назад</a>
                </form>
            </div>
            <div class="admin_blog_select_wrap">

                <div class="blog_wrap">
                    <div class="blog_element">
                        <h3>id = <?= $res['id'] ?></h3>
                        <h2 class="title"><?= $res['title'] ?></h2>
                        <img src="<?= $res['img'] ?>" alt="<?= $res['img_alt'] ?>" class="preview_logo">
                        <p class="preview_text"><?= $res['text_preview'] ?></p>
                        <div class="btn_wrap">
                            <button class="preview_btn">Подробнее</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php else: header('Location: /admin/blog'); endif; ?>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/settings_init.php';
echo $settings->list()['jqueryPath'];
echo $settings->list()['tinyCdn'];
echo $settings->list()['JqueryToTiny'];
?>
<script src="/src/js/tinymce_admin.js"></script>
</body>
</html>