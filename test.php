<?php
ini_set('display_errors', E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . "/tmp/header.php";
?>

    <!--main block-->
    <section class="main">
        <?php
        require_once 'tmp/nav_aside.php';
        ?>
        <p>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/core/db/db_conn.php';


            $sth = $conn->query('SELECT * FROM users');
            while ($var = $sth->fetch(PDO::FETCH_ASSOC)){
                if (password_verify('adad', $var['password'])){
                    $sth = null;
                    echo 1;
                    die();
                }
            }
            ?>

        </p>
    </section>

<?php
require_once 'tmp/footer.php';
?>