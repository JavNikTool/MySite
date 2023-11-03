<!--footer-->

<footer>
    <div class="container">
        <div class="footer_block">
            <p>Email: <a href="mailto:nikitakremnev0@gmail.com">nikitakremnev0@gmail.com</a></p>
            <p>Кремнев Никита. 2023.</p>
        </div>
    </div>
</footer>

<?php
echo $settings->list()['jsFuncPath'];
echo $settings->list()['jsPath'];
echo $settings->list()['ajax'];

if(isset($_GET['reg_err']) && $_GET['reg_err'] == 'true') {
    echo "<script type=\"application/javascript\">regError();</script>";
}elseif(isset($_GET['auth_err']) && $_GET['auth_err'] == 'true') {
    echo "<script type=\"application/javascript\">authError();</script>";
}elseif (isset($_GET['recover_err']) && $_GET['recover_err'] == 'true'){
    echo "<script type=\"application/javascript\">recoverError();</script>";
}
?>
<script src="/src/js/tinymce.js"></script>
</body>
</html>