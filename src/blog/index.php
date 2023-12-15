<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
require_once 'vendor/autoload.php';

use core\components\blog\Blog;

/**
 * @var $conn
 */
$arResult = Blog::getSortedList($conn)

?>

<section class="blog">
    <div class="container_blog">
        <div class="blog_wrap">

            <?php foreach ($arResult as $item): ?>

                <div class="blog_element">
                    <p class="time"><?= substr($item['date'], 0, strpos($item['date'], '.')); ?></p>
                    <h2 class="title"><?= $item['title'] ?></h2>
                    <img src="<?= $item['img'] ?>" alt="<?= $item['img_alt'] ?>" class="preview_logo">
                    <p class="preview_text"><?= $item['text_preview'] ?></p>
                    <div class="btn_wrap">
                        <a class="preview_btn" href="/blog/element/<?= $item['id'] ?>">Подробнее</a>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php';
?>
