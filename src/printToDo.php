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
$stmt = $conn->prepare("SELECT * FROM todotab WHERE (user_id = :user_id)");
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
    echo "<div class='todoList'>";
    echo "<p class='todoText todo_task' $special>" .$row['todotasks']. "</p>";
    

    
    echo "<form action='updateToDo.php' method='post'>";
    foreach ($row as $key => $value) {
    switch ($key) {
            case 'todoDone':
                //set checked to show if we have a set value
                $checked = $value ? "checked" : "";
                echo "<input type='checkbox' class='check-btn todo_check' name='$key' value='$key' $checked></input>";
                break;
            case 'todotasks':
                echo "<div class='dropdown todo_edit'><div class='edit-btn'></div><div class='dropdown-content'><input class='edit-task' name='$key' value='$value'></input></div></div>";
                break;

        }
    }
    

    
    echo "<button name='update' class='update-btn todo_update' value='" . $row['id'] . "'></button>";
    echo "</form>";
    // echo "</div>";

    
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button name='delete-btn' class='delete-btn todo_delete' value='" . $row['id'] . "'></button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "</div>";

