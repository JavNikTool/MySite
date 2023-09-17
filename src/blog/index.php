<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

$stm = $conn->query('SELECT * FROM blog');

$arResult = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="blog">
    <div class="container">
        <div class="blog_wrap">

            <?php foreach ($arResult as $item):?>

            <div class="blog_element">
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
</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php';
?>
