<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP<?php echo " Super Page" ?></title>
</head>
<body>
   <h1>PHP testing ground</h1>
<?php
$a = 5;
$myname = "Valdis";
echo "Hello " . $myname;
echo "<p>My lorem" . $a . "</p>";
date_default_timezone_set('Europe/Riga');
echo "Date is" . date('l jS \of F Y h:i:s A');
// $a is still alive but will be forgotten when </html>
?>
<hr>
<h2>plain HTML</h2>
<?php
echo "more php" . $a;
?>
</body>

<?php
echo "</html>";
