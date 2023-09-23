<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/nav_aside.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

$id = basename($_SERVER['REQUEST_URI']);

$stm = $conn->query("SELECT * FROM blog WHERE id = $id");

$arResult = $stm->fetch(PDO::FETCH_ASSOC);

?>


<h2><?=$arResult['title']?></h2>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/tmp/footer.php'; ?>
