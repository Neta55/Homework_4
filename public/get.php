<?php
require_once '../src/templates/head.php';
?>
<form action="get.php" method="get">
    <input type="text" name="myname" placeholder="Enter My Name" required>
    <input type="text" name="lastname" placeholder="Enter My Last Name" required>
    <input type="date" name="date" id="datepicker">
    <button type="submit" name="submitBtn" value="33">Submit</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "We got a GET request!<br>";
    foreach ($_GET as $key => $value) {
        echo "<div class='info-text'>We received name $key with value $value </div>";
    }
    if (isset($_GET['myname'])) {
        echo "Why hello there " . $_GET['myname'] . "! <hr>";
    }
    var_dump($_GET);
}
require_once '../src/templates/foot.php';