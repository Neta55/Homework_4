<?php


require_once 'db.php';
if (!isset($_SESSION['username'])) {
    // echo "<h2>Lai varētu apskatīt savu uzdevumu sarakstu, ir jāielogojas!</h2>";
    return;

} 
// else {
//     echo "Hello there " . $_SESSION['username'] . "!<br>";
// }



//sagatavot prasījumu un izpildīt
$stmt = $conn->prepare("SELECT * FROM todotab WHERE (user_id = :user_id) ORDER BY created DESC");
$stmt->bindParam(':user_id', $_SESSION['id']);
$stmt->execute();



// uzstāda, lai rindiņas nāktu ārā masīva režīmā
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//saglabā rezultātu atmiņā, nav labi pie liela datu apjoma (var uzkārties?)
$allRows = $stmt->fetchAll();

//beigās var izdrukāt rezultātu



foreach ($allRows as $row) {
     
    if (isset($row['todoDone'])) {
        $special = "Done-" . (int) $row['todoDone'];
    } else {
        $special = "Done-null";
    }
    if (isset($row['todoDone'])) {
        $editb = "edit-btn-" . (int) $row['todoDone'];
    } else {
        $editb = "edit-btn-null";
    }

    if (isset($row['todoDone'])) {
        $updateb = "update-btn-" . (int) $row['todoDone'];
    } else {
        $updateb = "update-btn-null";
    }

    if (isset($row['todoDone'])) {
        $deleteb = "delete-btn-" . (int) $row['todoDone'];
    } else {
        $deleteb = "delete-btn-null";
    }



    
    echo "<div class='todoList'>";
    // echo "<div class='int-cont'>";
    echo "<form action='updateToDo.php' method='post' class='int-cont'>";
    echo "<div class='todo_task'><p class='todoText $special'>" .$row['todotasks']. "</p></div>";
    
    foreach ($row as $key => $value) {
    switch ($key) {
            case 'todoDone':
                //set checked to show if we have a set value
                $checked = $value ? "checked" : "";
                echo "<div class='todo_check'><input type='checkbox' class='check-btn' name='$key' value='$key' $checked></input></div>";
                break;
            case 'todotasks':
                echo "<div class='dropdown todo_edit' ><div class='edit-btn $editb'></div><div class='dropdown-content'><textarea class='edit-task' name='$key' value='$value'>$value</textarea></div></div>";
                break;

        }
    }
    

    
    echo "<div class='todo_update'><button name='update' class='update-btn $updateb' value='" . $row['id'] . "'></button></div>";
    echo "</form>";
    // echo "</div>";

    
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<div class='todo_delete'><button name='delete-btn' class='delete-btn $deleteb' value='" . $row['id'] . "'></button></div>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "</div>";

