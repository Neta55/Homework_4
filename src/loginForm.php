<?php
//we need to start sesssion to check if user already exists
session_start();
if (isset($_SESSION['username'])) {
    echo "Lietotājs " . $_SESSION['username']. " ir ielogojies!";
} else {
    echo "<div class='header'> <h2>Jums ir nepieciešams <a href='registerForm.php'>reģistrēties</a> vai ielogoties:</h2>";
    echo "<form class='login' action='processLogin.php' method='post'>";
    echo "<input name='username' placeholder='IEVADIET LIETOTĀJVĀRDU' required>";
    echo "<input name='password' type='password' placeholder='IEVADIET PAROLI' required>";
    echo "<button type='submit' class='login-btn'></button>";
    echo "</form>";
    echo "</div>";
}
echo "<hr>";


