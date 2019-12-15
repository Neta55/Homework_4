<?php
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
// var_dump($allRows);
    // print_r(count($allRows));
    if (count($allRows) > 0) {
        $hash = $allRows[0]['hash'];
        // print_r($hash);
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