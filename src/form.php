<?php
session_start();
?>
<form action="process.php" method="get">
    <input type="text" name="myname" placeholder="Enter My Name" required>
    <input type="text" name="lastname" placeholder="Enter My Last Name" required>
    <input type="date" name="date" id="datepicker">
    <button type="submit" name="submitBtn" value="33">Submit</button>


</form>
<a href="form.php">Clear Form</a>
<?php
if (isset($_SESSION['myname'])) {
    echo "Hey I know you!" . $_SESSION['myname'];
} else {
    echo "You will need to provide a name above";
}
require 'stats.php';