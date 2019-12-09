<?php
require_once 'db.php';

//sagatavot prasījumu un izpildīt
$stmt = $conn->prepare("SELECT * FROM todotab");
$stmt->execute();

// uzstāda, lai rindiņas nāktu ārā masīva režīmā
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//saglabā rezultātu atmiņā, nav labi pie liela datu apjoma (var uzkārties?)
$allRows = $stmt->fetchAll();

//beigās var izdrukāt rezultātu

echo "<div class='todoList'>";

foreach ($allRows as $value) {
    
        echo "<div>";
        echo "<input type='checkbox' class='submit-btn' name='submit-btn' id='submit-btn'>";
        echo "<p class='todoText'>" .$value['todotasks']. "</p>";
        echo  "<button class='delete-btn' name='delete-btn' id='delete-btn'></button>";
    }
    
    
    // foreach ($row as $key => $value) {
    //     echo "<p class='todoText'>$value</p>";
        
    // }
    echo "<form action='deleteToDo.php' method='post'>";
    echo "<button name='delete-btn' value='" . $row['id'] . "'></button>";
    echo "</form>";
    echo "</div>";

echo "</div>";

// <div class="todoList">
//                 <input type='checkbox' class='submit-btn' name='submit-btn' id='submit-btn'>
//                 <p class='todoText'>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
//                 <button class='delete-btn' name='delete-btn' id='delete-btn'></button>
