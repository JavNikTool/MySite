<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /');
}
require_once 'vendor/autoload.php';

use core\components\blog\Blog;


ini_set('display_errors', E_ALL);

$id = $_REQUEST['id'];

if (!empty($id)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';

    /**
     * @var $conn
     * @var $settings
     */

    $blog = new Blog($conn);
    $blog->deleteBlogElementById($id);

    header('Location: /admin/blog');
} else {
    header('Location: /admin/blog');
}