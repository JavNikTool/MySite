<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Административная панель</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <div class="admin_nav">
        <a href="/admin/blog">Настройки блога</a>
        <a href="">Настройки сайта</a>
    </div>
</div>
</body>
</html>