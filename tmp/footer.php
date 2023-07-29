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
echo $settings->list()['jsPath'];
echo $settings->list()['ajax'];

if(isset($_GET['reload']) && $_GET['reload'] == 'true'){
    echo "<script type=\"application/javascript\">regForHandler();</script>";
    unset($_GET['reload']);
}
?>
</body>
</html>