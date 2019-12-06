<?php
if (isset($_SESSION['visits'])) {
    $_SESSION['visits']++;
    echo "You have been here " . $_SESSION['visits'] . "times<br>";
} else {
    $_SESSION['visits'] = 1;
    echo "This is your first visit today<br>";
}
