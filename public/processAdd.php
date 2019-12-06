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
    $title = $_POST['title'];
    $artist = $_POST['artist']; //FIXME when no artist exists
    $length = $_POST['length'];
    $user_id = 1; //TODO add real users

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO tracks (title, artist, length, user_id)
                            VALUES (:title, :artist, :length, :user_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':artist', $artist);
    $stmt->bindParam(':length', $length);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
    //we go to our index.php or rather our root
    header('Location: /');
} else {
    echo "That was not a POST, most likely GET";
}
