<?php
require_once "../config/config.php";
try {
    //if we needed to set port it would come after $SERVER;port=3307;dbname=$DB
    $conn = new PDO("mysql:host=$SERVER;dbname=$DB;charset=utf8", USER, PW);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //we would deal with broken connection here
    echo "Connection failed: " . $e->getMessage();
    die("No Database!");
}
