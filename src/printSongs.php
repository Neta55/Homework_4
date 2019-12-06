<?php
require_once 'db.php';

//we prepare a statement and execute it
$stmt = $conn->prepare("SELECT * FROM tracks");
$stmt->execute();

// set the resulting array to associative
$isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//we store the results in memory, might not be best for large results
$allRows = $stmt->fetchAll();

//finally we can print the results
echo "<hr>";
echo "<div class='song-container'>";
$columnsPrinted = false; //for column names
foreach ($allRows as $row) {
    if (!$columnsPrinted) {
        echo "<div class='row-column-names'>";
        foreach ($row as $key => $value) {
            echo "<span class='column-name'> $key </span>";
        }
        $columnsPrinted = true;
        echo "</div>";
    }
    echo "<div class='row-song'>";
    // echo "<span>Title: " . $row["title"] . "</span>";
    foreach ($row as $key => $value) {
        echo "<span class='value-cell'>$value </span>";

    }
    echo "<form action='deleteSong.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "<hr>";
