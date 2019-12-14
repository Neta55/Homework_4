<?php

if (!isset($_SESSION['username'])) {
    return;
    
}
?>

<div class="pamatne">
        <h1>Uzdevumu liste</h1>

<div>
    <form action="processAdd.php" method="post" class="item">
        <input class="item-input" type="text" name="todotasks" placeholder="IZVEIDO JAUNU UZDEVUMU" required >
        <button class="add-btn" type="submit" name="submit"></button>
        
    </form>
</div>

