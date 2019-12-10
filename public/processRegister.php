<?php
session_start();
require_once '../src/db.php';
require_once '../src/dbutils.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $username = $_POST['username'];
    if (strlen($_POST['password']) < 2) {
        header('Location: /');
    }
    if ($_POST['password'] != $_POST['password2']) {
        header('Location: /');

    }
    // you could check if password matches certain format
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //TODO add real users

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, hash)
                            VALUES (:username, :hash)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hash', $hash);

    $stmt->execute();
    //we go to our index.php or rather our root
    checkLogin($conn, $username, $_POST['password']);
} else {
    echo "Kaut kas nogāja greizi :(";
}
