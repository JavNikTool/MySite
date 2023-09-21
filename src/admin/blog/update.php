<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
ini_set('display_errors', E_ALL);


$id = $_REQUEST['id'];

if(!empty($id)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $sth = $conn->query("select * from blog WHERE id = $id");
    $res = $sth->fetch(PDO::FETCH_ASSOC);
}else{
    header('Location: /admin/settings/blog');
}

?>
<?php if($res) : ?>
<div class="container">
    <form action="update_submit" method="post" class="update_submit">
        Название поста <br> <input type="text" name="title" id="" value="<?=$res['title']?>"><br>
        Путь к картинке <br> <input type="text" name="img_path" id="" value="<?=$res['img']?>"><br>
        тег alt картинки <br> <input type="text" name="alt" id="" value="<?=$res['img_alt']?>"><br>
        текст <br> <input type="text" name="text" id="" value="<?=$res['text']?>"><br><br>
        <input type="hidden" name="id" value="<?=$res['id']?>">

        <input type="submit" value="Изменить">
    </form>
</div>
<?php else: header('Location: /admin/settings/blog'); endif;?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php';?>