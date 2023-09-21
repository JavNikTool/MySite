<?php
session_start();
if(!$_SESSION['admin']){
    header('Location: /');
}
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
            <form action="<?=basename($_SERVER['PHP_SELF'])?>/insert" method="post">
                Название поста <br> <input type="text" name="title" id=""><br>
                Путь к картинке <br> <input type="text" name="img_path" id=""><br>
                тег alt картинки <br> <input type="text" name="alt" id=""><br>
                текст <br> <input type="text" name="text" id=""><br><br>

                <input type="submit" value="Добавить">
            </form><br><br>


            <h2>Удалить элемент в блоге</h2>
            <form action="<?=basename($_SERVER['PHP_SELF'])?>/delete" method="post">
                id элемента, который надо удалить <br> <input type="text" name="id" id=""><br><br>

                <input type="submit" value="Удалить">
            </form><br><br>


            <h2>Изменить элемент в блоге</h2>
            <form action="<?=basename($_SERVER['PHP_SELF'])?>/update" method="post">
                id элемента, который надо изменить <br> <input type="text" name="id" id=""><br><br>

                <input type="submit" value="Изменить">
            </form>
        </div>
        <div class="admin_blog_select_wrap">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
            $stm = $conn->query('SELECT * FROM blog');

            $arResult = $stm->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="blog_wrap">

                <?php foreach ($arResult as $item):?>

                    <div class="blog_element">
                        <h3>id = <?=$item['id']?></h3>
                        <h2 class="title"><?=$item['title']?></h2>
                        <img src="https://s16.stc.all.kpcdn.net/russia/wp-content/uploads/2019/01/Altai-.jpg" alt="<?=$item['alt']?>" class="preview_logo">
                        <p class="preview_text"><?=$item['text']?></p>
                        <div class="btn_wrap">
                            <button class="preview_btn">Подробнее</button>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>