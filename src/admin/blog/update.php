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
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

ini_set('display_errors', E_ALL);


$id = $_REQUEST['id'];

if(!empty($id)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $sth = $conn->query("select * from blog WHERE id = $id");
    $res = $sth->fetch(PDO::FETCH_ASSOC);
}else{
    header('Location: /admin/blog');
}

?>
<?php if($res) : ?>
    <div class="container">
        <div class="admin_blog_wrap">
            <div class="admin_blog_insert_wrap">
                <form action="/admin/update_submit" method="post" class="update_submit">
                    Название поста <br> <input type="text" name="title" id="" value="<?=$res['title']?>"><br>
                    Путь к картинке <br> <input type="text" name="img_path" id="" value="<?=$res['img']?>"><br>
                    тег alt картинки <br> <input type="text" name="alt" id="" value="<?=$res['img_alt']?>"><br>
                    текст <br> <input type="text" name="text" id="" value="<?=$res['text']?>"><br><br>
                    <input type="hidden" name="id" value="<?=$res['id']?>">

                    <input type="submit" value="Изменить"> <br><br>
                    <a class="adm_update_back_btn" href="/admin/blog">назад</a>
                </form>
            </div>
            <div class="admin_blog_select_wrap">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
                $stm = $conn->query("SELECT * FROM blog where id = $id");

                $arResult = $stm->fetch(PDO::FETCH_ASSOC);
                ?>

                <div class="blog_wrap">
                    <div class="blog_element">
                        <h3>id = <?=$arResult['id']?></h3>
                        <h2 class="title"><?=$arResult['title']?></h2>
                        <img src="https://s16.stc.all.kpcdn.net/russia/wp-content/uploads/2019/01/Altai-.jpg" alt="<?=$arResult['img_alt']?>" class="preview_logo">
                        <p class="preview_text"><?=$arResult['text']?></p>
                        <div class="btn_wrap">
                            <button class="preview_btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: header('Location: /admin/blog'); endif;?>


</body>
</html>