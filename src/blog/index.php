<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
require_once 'vendor/autoload.php';

use core\components\blog\Blog;

$arResult = Blog::getList($conn)

?>

<section class="blog">
    <div class="container">
        <div class="blog_wrap">

            <?php foreach ($arResult as $item):?>

            <div class="blog_element">
                <span class="time"><?=substr($item['date'], 0, strpos($item['date'], '.'));?></span>
                <h2 class="title"><?=$item['title']?></h2>
                    <img src="<?=$item['img']?>" alt="<?=$item['img_alt']?>" class="preview_logo">
                <p class="preview_text"><?=$item['text']?></p>
                <div class="btn_wrap">
                    <a class="preview_btn" href="/blog/element/<?=$item['id']?>">Подробнее</a>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php';
?>
