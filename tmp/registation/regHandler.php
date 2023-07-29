<?php
if(!empty($_POST['loginReg']) && !empty($_POST['passwordReg'])){
    $login = $_POST['loginReg'];
    $password = md5($_POST['passwordReg']);

    echo $login . '<br>';
    echo $password;
}


/*header('Location: /');*/