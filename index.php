<?php
require_once 'temp/header.php';
?>

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
            <a href="contacts/index.php" target="_blank">Связь со мной</a>
            <a href="about/index.php" target="_blank">Обо мне</a>
            <a href="blog/index.php" target="_blank">Перейти в блог</a>
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
            Я начинающий программист-самоучка, сайт мне этот нужен для реализации <b>удобного, вечно подручного для меня пространства</b>, где я смогу вести свои заметки и размышления о своем собственном обучении. <br><br> Я нахожу эту идею достаточно удобной - обзавестись личным "блогом", где помимо аккумуляции нужной мне информации, я смогу обсуждать интересующий материал вместе с пользователями. И если это косвенно поможет в обучении не только мне, но кому-то еще, я буду только рад!
        </aside>
    </div>
    </div>
</section>

<?php
require_once 'temp/footer.php';
?>