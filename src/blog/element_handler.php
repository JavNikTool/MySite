<?php

/**
 * @var $conn
 */

$blogElementId = $_REQUEST['blogElementId'];
$userLogin = $_REQUEST['userLogin'];
$comment = $_REQUEST['comment'];
$referer = strstr($_SERVER['HTTP_REFERER'], '/blog');


if(!empty($blogElementId) && !empty($userLogin) && !empty($comment))
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $stm = $conn->query("select id from users where login = '$userLogin'");
    $userId = $stm->fetch(PDO::FETCH_ASSOC)['id'];

    $stm2 = $conn->prepare("INSERT INTO chat (blog_id, user_id, comment, author) VALUES (:blogElementId, :userId, :comment, :userLogin)");
    $stm2->execute([
        'blogElementId' => $blogElementId,
        'userId' => $userId,
        'comment' => $comment,
        'userLogin' => $userLogin
    ]);
    header("Location: $referer");
    die();
}else
{
    header("Location: $referer");
    die();
}