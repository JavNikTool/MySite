<?php


session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}
require_once 'vendor/autoload.php';

use core\components\blog\Blog;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Административная панель</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <div class="admin_blog_wrap">
        <div class="admin_blog_insert_wrap">
            <h2>Добавить элемент в блог</h2>
            <form action="/admin/insert" method="post" enctype="multipart/form-data" id="admin_insert_frm">
                Название поста <br> <input type="text" name="title" id="title"><br>
                Путь к картинке <br> <input type="file" name="img_path" id="file"><br>
                текста анонса <br> <input type="text" name="text_preview" id=""><br>
                тег alt картинки <br> <input type="text" name="alt" id=""><br>
                текст <br> <textarea name="text" class="tinymce_textarea"></textarea><br><br>

                <input type="submit" value="Добавить">
            </form>
            <br><br>
        </div>
        <div class="admin_blog_select_wrap">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

            try {
                /**
                 * @var $conn
                 * @var $settings
                 */
                $arResult = Blog::getSortedList($conn);
                ?>

                <div class="blog_wrap">

                    <?php foreach ($arResult as $item): ?>

                        <div class="blog_element_admin">
                            <form action="/admin/delete?id=<?= $item['id'] ?>" method="post">
                                <input type="submit" value="Удалить" class="blog_element_delete">
                            </form>
                            <form action="/admin/update?id=<?= $item['id'] ?>" method="post">
                                <input type="submit" value="Изменить" class="blog_element_update">
                            </form>
                            <h3>id = <?= $item['id'] ?></h3>
                            <h2 class="title"><?= $item['title'] ?></h2>
                            <img src="<?= $item['img'] ?>" alt="<?= $item['img_alt'] ?>" class="preview_logo">
                            <p class="preview_text"><?= $item['text_preview'] ?></p>
                            <div class="btn_wrap">
                                <button class="preview_btn">Подробнее</button>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

                <?php
            } catch (Exception $e) {
                echo "ошибка в файле: " . "<br>" . $e->getFile() . "<br>" . " строка: " . $e->getLine() . "<br>" . " некорректно указан тип сортировки";
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/settings_init.php';
echo $settings->list()['jqueryPath'];
echo $settings->list()['tinyCdn'];
echo $settings->list()['JqueryToTiny'];
?>
<script src="/src/js/tinymce_admin.js"></script>
</body>
</html>