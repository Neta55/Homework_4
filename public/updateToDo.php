<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //to add to database
    $todo_id=$_POST['update'];
    $todotasks = $_POST['todotasks'];
    
    //for check boxes we only get the value when checkbox is checked!
    $isTodoDone = isset($_POST['todoDone']);

    
    $stmt = $conn->prepare("UPDATE `todotab`
        SET `todotasks` = (:todotasks),
            `todoDone` = (:todoDone)
        WHERE `todotab`.`id` = (:todoid)");

    $stmt->bindParam(':todoid', $todo_id);
    $stmt->bindParam(':todotasks', $todotasks);
    $stmt->bindParam(':todoDone', $isTodoDone);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}