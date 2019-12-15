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
    echo "<div class='userImage'></div> <input name='username' class='login-input' placeholder='IEVADI LIETOTĀJVĀRDU' required>";
    echo "<input name='password' class='login-input' type='password' placeholder='IEVADI PAROLI' required>";
    echo "<button type='submit' class='login-btn'></button>";
    echo "</form>";
    echo "</div>";
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'shortpassword':
                echo "<h3><strong>REĢISTRĒTIES NEIZDEVĀS!</strong> <br>Parole ir pārāk īsa, jāizmanto vismaz 5 burti vai simboli.<br>Ej atpakaļ uz reģistrācijas lapu un saskaiti zīmes!</h3>";
                break;
            case 'userexists':
                echo "<h3><strong>REĢISTRĒTIES NEIZDEVĀS!</strong> <br>Lietotājs ar tādu vārdu jau eksistē.<br>Ej atpakaļ uz reģistrācijas lapu un izdomā citu!</h3>";
                break;
            case 'mismatch':
                echo "<h3><strong>REĢISTRĒTIES NEIZDEVĀS!</strong> <br>Paroles nesakrīt. <br>Ej atpakaļ uz reģistrācijas lapu un esi uzmanīgāks!</h3>";
                break;               
            default:
                echo "<h3>Tevi piereģistrēt neizdevās, jo: " . $_GET['error'] . "</h3>";
                break;
        }
    }
    
}


