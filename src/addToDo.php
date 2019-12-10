<?php
if (!$_SESSION['username']) {
    return;
}
?>

<div class="pamatne">
        <h1>MANS UZDEVUMU SARAKSTS</h1>

<div>
    <form action="processAdd.php" method="post" class="item">
        <input class="item-input" type="text" name="todotasks" placeholder="IZVEIDOJIET JAUNU UZDEVUMU" required >
        <button class="add-btn" type="submit" name="submit"></button>
        
    </form>
</div>

