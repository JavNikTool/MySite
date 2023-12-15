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

if (str_contains($blogElementId, '?')) {
    $blogElementId = strstr($blogElementId, '?', true);
}

$stm = $conn->query("SELECT * FROM blog WHERE id = $blogElementId");

if ($stm->rowCount() == 0) {
    die("Запись не обнаружена");
}

$arResult = $stm->fetch(PDO::FETCH_ASSOC);


?>


<div class="container_blog">
    <div class="blog_element">
        <h2 class="blog_element_title"><?= $arResult['title'] ?></h2>
        <img class="blog_element_img" src="<?= $arResult['img'] ?>" alt=""><br>
        <p class="blog_element_text"><?= $arResult['text'] ?></p>
    </div>

    <hr>

    <h3>Добавить комментарий:</h3>
    <?php
    if (!empty($_SESSION['login'])):
        $userLogin = $_SESSION['login'];
        ?>
        <form method="post" class="comment_form" action="/blog/element_handler">
            <textarea name="comment" class="tinymce_textarea_blog"></textarea> <br>
            <input type="hidden" name="userLogin" value="<?= $userLogin ?>">
            <input type="hidden" name="blogElementId" value="<?= $blogElementId ?>">
            <input class="addComment" type="submit" value="Добавить">
        </form>

    <?php else: ?>
        <p>Необходима авторизация: <span class='log-in_blog'>Вход</span></p>
    <?php endif; ?>


    <h2>Комментарии:</h2>

    <?php
    $stm = $conn->query("SELECT chat.id ,chat.comment, chat.author, chat.time, users.admin FROM chat join users on chat.user_id = users.id where blog_id = $blogElementId order by time");

    if ($stm->rowCount() > 0) {
        $arResult = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($arResult as $value) {
            ?>
            <div class="comment_wrap">
                <div class="comment_head">
                    <h3><i class="fa-regular fa-user"></i><span
                                class="<?= $value['admin'] ? 'admin_comment_span' : '' ?>"><?= $value['author'] ?></span>
                    </h3>
                    <h3><i class="fa-regular fa-clock"></i><?= strstr($value['time'], '.', true) ?></h3>
                </div>

                <div class="comment_body">
                    <div class="comment_body_data">

                        <?php if ($value['admin']): ?>
                            <div class="comment_photo">
                                <img src="/src/img/photo/ph.jpg" alt="myPhoto">
                            </div>
                        <?php else: ?>
                            <div class="comment_photo">
                                <img src="/src/img/logo/php.png" alt="php">
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === $value['author']): ?>
                            <div class="comment_text" data-comment="yes" data-element-id="<?= $value['id'] ?>"
                                 id="editor<?= $value['id'] ?>">
                                <?= $value['comment'] ?>
                            </div>
                        <?php else: ?>
                            <div class="comment_text">
                                <?= $value['comment'] ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="comment_body_actions">

                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === $value['author']): ?>
                            <a href="" data-btn-edit="yes" class="EditCommentBtn"><i class="fa-solid fa-pen"></i>
                                редактировать</a>
                            <a href="" data-btn-delete="yes" class="deleteCommentBtn"><i class="fa-solid fa-xmark"></i>
                                удалить</a>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
            <?php
        }
    } else {
        echo "комментарии отсутствуют.";
    }
    ?>

</div>
<?php
echo $settings->list()['tinyCdn'];
echo $settings->list()['JqueryToTiny'];
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php'; ?>

