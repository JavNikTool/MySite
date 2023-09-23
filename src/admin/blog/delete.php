<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}
ini_set('display_errors', E_ALL);

$id = $_REQUEST['id'];

if(!empty($id)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    $conn->query("DELETE FROM blog WHERE id = $id");
    header('Location: /admin/blog');
}else{
    header('Location: /admin/blog');
}