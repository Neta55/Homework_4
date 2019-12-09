<?php
require_once 'db.php';
// if (!isset($_SESSION['username'])) {
//     echo "<h2>Lai varētu apskatīt savu uzdevumu sarakstu, ir jāielogojas!</h2>";
//     return;
// }

//sagatavot prasījumu un izpildīt
$stmt = $conn->prepare("SELECT * FROM todotab");
$stmt->execute();

// uzstāda, lai rindiņas nāktu ārā masīva režīmā
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//saglabā rezultātu atmiņā, nav labi pie liela datu apjoma (var uzkārties?)
$allRows = $stmt->fetchAll();

//beigās var izdrukāt rezultātu


echo "<div class='todoList'>";
foreach ($allRows as $row) {
     
    if (isset($row['todoDone'])) {
        $special = "Done-" . $row['todoDone'];
    } else {
        $special = "Done-null";
    }

    echo "<p class='todoText' $special>" .$row['todotasks']. "</p>";
    
    // echo "<input type='checkbox' value='" . $value['todoDone'] . "' class='submit-btn' name='taskDone'>"; 
    echo "<div class=''>";
    echo "<form action='updateToDo.php' method='post'>";
        
    foreach ($row as $key => $value) {
    switch ($key) {
            case 'todoDone':
                //set checked to show if we have a set value
                $checked = $value ? "checked" : "";
                echo "<input type='checkbox' class='value-$key check-btn' name='$key' value='$key' $checked></input>";
                break;
            case 'todotasks':
                echo "<input class='value-$key' name='$key' value='$value'></input>";
                break;

        }
    }
    echo "<button name='update' class='update-btn' value='" . $row['id'] . "'></button>";
    echo "</form>";
    echo "</div>";

    
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button name='delete-btn' class='delete-btn' value='" . $row['id'] . "'></button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";

