<?php
//we need to start sesssion to check if user already exists
session_start();
if (isset($_SESSION['username'])) {
    echo "<h2>Lietotājs " . $_SESSION['username']. " ir ielogojies!</h2>";
} else {
    echo "<div class='header'> <h2>Jums ir nepieciešams ielogoties vai reģistrēties <a href='registerForm.php' class='addUserImage'>šeit</a> </h2>";
    echo "<form class='login' action='processLogin.php' method='post'>";
    echo "<div class='userImage'></div> <input name='username' class='login-input' placeholder='IEVADIET LIETOTĀJVĀRDU' required>";
    echo "<input name='password' class='login-input' type='password' placeholder='IEVADIET PAROLI' required>";
    echo "<button type='submit' class='login-btn'></button>";
    echo "</form>";
    echo "</div>";
}


