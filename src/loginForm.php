<?php
//we need to start sesssion to check if user already exists

if (isset($_SESSION['username'])) {
    echo "<div class='header' 'login'>";
    echo "<form action='processLogout.php' method='post'>";
    echo "<div class='login3'><h2>Lietotājs " . $_SESSION['username']. " ir pieslēdzies!    Atslēgties  </h2><button class='logout-btn'> </button></div>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<div class='header1'>"; 
    echo "<div class='login4'><h2>Lūdzu ielogojies vai reģistrējies</h2> <a href='registerForm.php'><button type='button' class='registr-btn'></button></a> </div>";
    echo "<form class='login2' action='processLogin.php' method='post'>";
    echo "<div class='userImage'></div> <input name='username' class='login-input' placeholder='IEVADIET LIETOTĀJVĀRDU' required>";
    echo "<input name='password' class='login-input' type='password' placeholder='IEVADIET PAROLI' required>";
    echo "<button type='submit' class='login-btn'></button>";
    echo "</form>";
    echo "</div>";
}


