<?php
require_once '../src/templates/head.php';
?>
    <div class="header1">
        <h2>Lai reģistrētos, lūdzu aizpildi!</h2>
        <form action="processRegister.php" method="post" class="login2">
        <div class="addUserImage"></div>
            <input class="login-input" type="text" name="username" placeholder="IZVEIDO LIETOTĀJVĀRDU" required>
            <input class="login-input" type="password" name="password" required placeholder="IZVEIDO PAROLI (min. 5 zīmes)">
            <input class="login-input" type="password" name="password2" required placeholder="ATKĀRTO IZVEIDOTO PAROLI">
            <button type="submit" name="login" class="login-btn"></button>
        </form>
    </div>
<?php
require_once '../src/templates/foot.php';



