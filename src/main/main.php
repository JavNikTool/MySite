<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . "/tmp/header.php";
?>

    <!--main block-->
    <section class="main">
        <?php
        require_once 'tmp/nav_aside.php';
        ?>

        <div class="container">
            <p class="main_text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio commodi minima similique nesciunt itaque at fugit tempora optio asperiores necessitatibus? Possimus laboriosam, ab vitae similique eos id dolores harum illum.
            </p>
            <div class="main_buttons">
                <a class="ajax" href="/src/contacts/index.php">Связь со мной</a>
                <a class="ajax" href="/src/about/index.php">Обо мне</a>
                <a class="ajax" href="/src/blog/index.php">Перейти в блог</a>
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
require_once 'tmp/footer.php';
?>