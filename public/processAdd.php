<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $todotasks = $_POST['todotasks'];
    $user_id = 1; //kamēr nav citu šis ir stacionārais mans ievadītais

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO todotab (todotasks, user_id) 
    VALUES (:todotasks, :user_id)");
    
    $stmt->bindParam(':todotasks', $todotasks);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
