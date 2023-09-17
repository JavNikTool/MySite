<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php'; ?>

    <div class="container">
        <h2>Добавить элемент в блог</h2>
        <form action="insert" method="post">
            Название поста <br> <input type="text" name="title" id=""><br>
            Путь к картинке <br> <input type="text" name="img_path" id=""><br>
            тег alt картинки <br> <input type="text" name="alt" id=""><br>
            текст <br> <input type="text" name="text" id=""><br><br>

            <input type="submit" value="Добавить">
        </form>
    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php'; ?>