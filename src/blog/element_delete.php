<?php

/**
 * @var $conn
 * @var $settings
 */

$commentId = $_GET['cmt'];
$referer = strstr($_SERVER['HTTP_REFERER'], '/blog');



if(!empty($commentId)){
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $sth = $conn->prepare("DELETE FROM chat WHERE id = :id");
    $sth->execute(['id' => $commentId]);
    header("Location: $referer");
    die();
}else{
 header("Location: $referer");
}