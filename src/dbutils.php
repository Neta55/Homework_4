<?php
require_once '../config/config.php';
function getConn($SERVER, $DB, $user, $pw, $port = 3306)
{
    try {
        //if we needed to set port it would come after $SERVER;port=3307;dbname=$DB
        $conn = new PDO("mysql:host=$SERVER;dbname=$DB;charset=utf8", $user, $pw);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //we would deal with broken connection here
        echo "Connection failed: " . $e->getMessage();
        $conn = null;
    }
    return $conn;
}
function checkLogin($conn, $username, $password)
{
    // prepare and bind
    $stmt = $conn->prepare("SELECT id, hash FROM users
        WHERE (username = :username)");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//we store the results in memory, might not be best for large results
    $allRows = $stmt->fetchAll();

    if (count($allRows) > 0) {
        $hash = $allRows[0]['hash'];
        
        if (password_verify($password, $hash)) {
            header('Location: /');
            $_SESSION['username'] = $username;
            $_SESSION['id'] = (int) $allRows[0]['id'];
        } else {
            echo 'Pierakstīties neizdevās! Nepareizs lietotājvārds vai parole.';
            // echo "<script>alert('Pierakstīties neizdevās! Nepareizs lietotājvārds vai parole.')</script>";
            
        }
    }
    header('Location: /');
}