<?php
require_once '../src/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "We got a POST request!<br>";
    // foreach ($_POST as $key => $value) {
    //     echo "<div class='info-text'>We received name $key with value $value </div>";
    // }
    // if (isset($_POST['myname'])) {
    //     echo "Why hello there " . $_POST['myname'] . "! <hr>";
    // }
    // var_dump($_POST);

    //we need to add song to database
    $song_id = $_POST['delete'];

    // prepare and bind
    $stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (:songid)");
    $stmt->bindParam(':songid', $song_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
