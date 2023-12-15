<?php


$data = $_REQUEST['data'];
$id = $_REQUEST['id'];

if (!empty($data)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';
    /**
     * @var $conn
     * @var $settings
     */
    $sth = $conn->prepare("UPDATE chat SET comment = :data, time = time WHERE id = :id");
    $sth->execute([
        'data' => $data,
        'id' => $id
    ]);
    die();
}