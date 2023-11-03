<?php

/**
 * @var $conn
 * @var $settings
 */

ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

$blogElementId = basename($_SERVER['REQUEST_URI']);

if(str_contains($blogElementId, '?')){
    $blogElementId = strstr($blogElementId, '?', true);
}

$stm = $conn->query("SELECT * FROM blog WHERE id = $blogElementId");

$arResult = $stm->fetch(PDO::FETCH_ASSOC);

?>


<div class="container">
    <div class="blog_element">
        <h2 class="blog_element_title"><?=$arResult['title']?></h2>
        <img class="blog_element_img" src="<?=$arResult['img']?>" alt=""><br>
        <p class="blog_element_text"><?=$arResult['text']?></p>
    </div>

    <hr>

    <h3>Добавить комментарий:</h3>
    <?php
    if(!empty($_SESSION['login'])):
        $userLogin = $_SESSION['login'];
        ?>
        <form class="forma" method="post" action="/blog/element_handler">
            <textarea name="comment" class="tinymce_textarea_blog"></textarea> <br>
            <input type="hidden" name="userLogin" value="<?=$userLogin?>">
            <input type="hidden" name="blogElementId" value="<?=$blogElementId?>">
            <input type="submit" value="Отправить">
        </form>
    <?php else:?>
    <p>Необходима авторизация: <span class='log-in_blog'>Вход</span></p>
    <?php endif;?>


    <h2>Комментарии:</h2>

    <?php

    $stm = $conn->query("SELECT * FROM chat WHERE blog_id = $blogElementId");
    $arResult = $stm->fetch(PDO::FETCH_ASSOC);

    if(is_array($arResult)) {
        $stm2 = $conn->query("SELECT * FROM chat WHERE blog_id = $blogElementId");
        $arResult2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($arResult2 as $value)
        {
            ?>
                <div class="">
                    <p><?=$value['author']?></p>
                    <p><?=strstr($value['time'], '.', true)?></p>
                    <div class="">
                        <p><?=$value['comment']?></p>
                    </div>
                </div>
            <?php
        }
    }
    else{
        echo "комментарии отсутствуют.";
    }
    ?>

</div>
<?php
echo $settings->list()['tinyCdn'];
echo $settings->list()['JqueryToTiny'];
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php'; ?>

