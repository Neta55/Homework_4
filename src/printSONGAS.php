<?php
require_once 'db.php';

if (!isset($_SESSION['username'])) {
    echo "Please Login to see your songs";
    return;
}
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

    if (isset($row['favorite'])) {
        $special = "song-style-" . $row['favorite'];
    } else {
        $special = "song-style-null";
    }

    echo "<div class='row-song $special'>";
    echo "<form action='updateSong.php' method='post'>";
    echo "<div class='update-songs'>";
    // echo "<span>Title: " . $row["title"] . "</span>";

    foreach ($row as $key => $value) {

        //TODO we need to process title, artist and length seperately as special cases
        switch ($key) {
            case 'favorite':
                //set checked to show if we have a set value
                $checked = $value ? "checked" : "";
                echo "<input type='checkbox' class='value-$key' name='$key' value='$key' $checked></input>";
                break;
            case 'title':
            case 'artist':
            case 'length':
                echo "<input class='input-value-cell value-$key' name='$key' value='$value'></input>";
                break;
            default:
                echo "<span class='value-cell'>$value </span>";
                break;
        }
    }
    echo "<button name='update' value='" . $row['id'] . "'>Update</button>";
    echo "</div>";
    echo "</form>";
    echo "<form action='deleteSong.php' method='post'>";
    echo "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
    echo "</form>";
    echo "</div>";
}
echo "</div>";
echo "<hr>";
