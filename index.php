<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/temp/header.php";
?>

    <!-- preloader -->
<div class="svg-loader">
    <svg class="svg-container" height="100" width="100" viewBox="0 0 100 100">
        <circle class="loader-svg bg" cx="50" cy="50" r="45"></circle>
        <circle class="loader-svg animate" cx="50" cy="50" r="45"></circle>
    </svg>
    <p class="preloaderTitle">Загрузка.</p>
</div>

<!--main block-->
<section class="main">
    <?php
    require_once 'temp/nav_aside.php';
    ?>

    <div class="container">
        <p class="main_text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio commodi minima similique nesciunt itaque at fugit tempora optio asperiores necessitatibus? Possimus laboriosam, ab vitae similique eos id dolores harum illum.
        </p>
        <div class="main_buttons">
            <a class="ajax" href="contacts/index.php">Связь со мной</a>
            <a class="ajax" href="about/index.php">Обо мне</a>
            <a class="ajax" href="blog/index.php">Перейти в блог</a>
        </div>
    </div>

</section>

<!--wrap_block-->
<section class="wrap_block">
</section>

<!--info_block-->
<section class="info_block">
    <div class="container">
    <div class="info_block_wrap">
        <div class="info_block_wrap-quote">
            <div class="info_block_quote">
                <q>И подумал он: <br> а что если создать собственный <i>сайт?</i></q>
            </div>
        </div>
        <aside>
            Если вы случайно попали на этот сайт, то вам, наверно, любопытно, какого он вообще нужен,и кто я такой, тогда <i>слушайте:</i><br><br>
            Я начинающий программист-самоучка, сайт мне этот нужен для реализации <b>удобного, постоянно подручного для меня пространства</b>, где я смогу вести свои заметки и размышления о своем собственном обучении. <br><br> Я нахожу эту идею достаточно удобной - обзавестись личным "блогом", где помимо аккумуляции нужной мне информации, я смогу обсуждать интересующий материал вместе с пользователями. И если это косвенно поможет в обучении не только мне, но кому-то еще, я буду только рад!
        </aside>
    </div>
    </div>
</section>

<?php
require_once 'temp/footer.php';
?>