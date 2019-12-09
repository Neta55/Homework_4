<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //we need to add song to database
    $username = $_POST['username'];
    if (strlen($_POST['password']) < 2) {
        echo "Parole ir pārāk īsa!";
        die("Par īsu!");
    }
    if ($_POST['password'] != $_POST['password2']) {
        echo "Paroles nesakrīt!";

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
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
