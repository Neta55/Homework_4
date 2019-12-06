<?php
session_start();
echo "Processing Form.<br>";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "We got a GET request!<br>";
    foreach ($_GET as $key => $value) {
        echo "We received name $key with value $value <br>";
    }
    if (isset($_GET['myname'])) {
        echo "Why hello there " . $_GET['myname'] . "! <hr>";
        $_SESSION['myname'] = $_GET['myname'];
    }

    header('Location: /greeting.php');
}
