<?php
require_once '../src/templates/head.php';
?>
    <div class="header">
        <h2>Lai reģistrētos, lūdzu aizpildiet!</h2>
        <form action="processRegister.php" method="post">
        <div class="addUserImage"></div>
            <input class="login-input" type="text" name="username" placeholder="IZVEIDOJIET LIETOTĀJVĀRDU" required>
            <input class="login-input" type="password" name="password" required placeholder="IZVEIDOJIET PAROLI (min. 8 simboli)">
            <input class="login-input" type="password" name="password2" required placeholder="ATKĀRTOJIET JAUNO PAROLI">
            <button type="submit" name="login" class="login-btn"></button>
        </form>
    </div>
<?php
require_once '../src/templates/foot.php';



