<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}
?>

<!DOCTYPE html>

<head>

    <title>REGINA'S JEWELLERY</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='jstyle.css'>
</head>

<div class="section_header">
    <h1>REGINA'S JEWELLERY</h1>
</div>

<nav>
    <a href='regina.php'> HOME </a>
    <a href='rings.php'> RINGS </a>
    <a href='earrings.php'> EARRINGS </a>
    <a href='jlogin.php'> LOGIN </a>
</nav>


<div class="section divider-home" alt="school canteen menu with welcome message"></div>
<div class="section">
    <div class="container">

        <h2>Rings</h2>
        <p>Select an item and view the information!</p>


