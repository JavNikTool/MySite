<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/src/img/favicon/site.webmanifest">
    <link rel="stylesheet" href="style.css">
    <title>Административная панель</title>
</head>
<body>
<div class="admin_wrap">
    <form action="/admin/admin_handler" method="post">
        <span>Логин: </span><br>
        <input type="text" name="adm_log" id=""><br>
        <span>Пароль: </span><br>
        <input type="password" name="adm_pass" id=""><br>
        <input type="submit" value="Вход">
    </form>
</div>
</body>
</html>