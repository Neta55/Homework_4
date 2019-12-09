<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $toDo_id = $_POST['delete-btn'];

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM `todotab` WHERE `todotab`.`id` = (:todoid)");
    $stmt->bindParam(':todoid', $toDo_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}


