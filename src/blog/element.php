<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

$id = basename($_SERVER['REQUEST_URI']);

$stm = $conn->query("SELECT * FROM blog WHERE id = $id");

$arResult = $stm->fetch(PDO::FETCH_ASSOC);

?>


<div class="container">
    <div class="blog_element">
        <h2 class="blog_element_title"><?=$arResult['title']?></h2>
        <img class="blog_element_img" src="<?=$arResult['img']?>" alt=""><br>
        <p class="blog_element_text"><?=$arResult['text']?></p>
    </div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php'; ?>
