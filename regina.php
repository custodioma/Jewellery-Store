<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}

// Query to populate the dropdown form with rings in my database
$all_rings_query = "SELECT RingID, RName, Price, Stock, Material, Description FROM rings";
$all_rings_result = mysqli_query($con, $all_rings_query);

// Query to populate the dropdown form with earrings in my database
$all_earrings_query = "SELECT EarringID, EName, Price, Stock, Material, Description FROM earrings";
$all_earrings_result = mysqli_query($con, $all_earrings_query);
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


<div class="section divider-home" alt="jewellery collage"></div>
<div class="section">
    <div class="container">

        <h2>Rings</h2>
        <p>Select an item and view the information!</p>
        <br>
        <main>
            <form name='rings_form' id='rings_form' method='get' action='rings.php'>
                <select id='ring' name='ring'>
                    <?php
                    while ($all_rings_record = mysqli_fetch_assoc($all_rings_result)) {
                        echo "<option value = '" . $all_rings_record['RingID'] . "'>";
                        echo $all_rings_record['RName'];
                        echo "</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='rings_button' value='show me the ring information'>
            </form>
        </main>


    </div>

</div>

<div class="section divider-home" alt="jewellery collage "></div>
<div class="section">
    <div class="container">

        <h2>Earrings</h2>
        <p>Select an item and view the information!</p>
        <br>
        <main>
            <form name='earrings_form' id='earrings_form' method='get' action='earrings.php'>
                <select id='earring' name='earring'>
                    <?php
                    while ($all_earrings_record = mysqli_fetch_assoc($all_earrings_result)) {
                        echo "<option value = '" . $all_earrings_record['EarringID'] . "'>";
                        echo $all_earrings_record['EName'];
                        echo "</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='earrings_button' value='show me the earring information'>
            </form>
        </main>
    </div>

</div>


