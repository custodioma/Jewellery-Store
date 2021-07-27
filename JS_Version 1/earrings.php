<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");


if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id = 1;
}


$this_drink_query = "SELECT Item, Cost FROM drinks WHERE DrinkID = '" . $id . "'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);

$all_drinks_query = "SELECT DrinkID, Item FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

$update_drinks = "SELECT * FROM drinks";
$update_drinks_record = mysqli_query($con, $update_drinks);

?>
<!DOCTYPE html>

<head>

    <title>REGINA'S JEWELLERY</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='jstyle.css'>

</head>

<body>
<header>
    <h1>REGINA'S JEWELLERY</h1>
    <nav>
        <ul>
            <a href='regina.php'> HOME </a>
            <a href='rings.php'> RINGS </a>
            <a href='earrings.php'> EARRINGS </a>
            <a href='jlogin.php'>LOGIN</a>
            <a href='update_drinks.php'>UPDATE DRINKS</a>
        </ul>
    </nav>
</header>

<main>
    <h2>Drinks Information</h2>

    <?php

    echo "<p> Drink Name: " . $this_drink_record['Item'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>
</main>

<main>
    <h2>Select another drink</h2>
    <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
        <select id='drink' name='drink'>
            <!--options-->
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '".$all_drinks_record['DrinkID']."'>";
                echo $all_drinks_record['Item'];
                echo"</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information'>
    </form>

</body>

<main>
    <h2>Select a Drink</h2>

    <form action = "" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>
</main>

<?php

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query1 = "SELECT * FROM drinks WHERE Item LIKE '%$search%'";
    $query = mysqli_query($con, $query1);
    $count = mysqli_num_rows($query);

    if($count == 0){
        echo "There was no search results!";
    }else{

        while ($row = mysqli_fetch_array($query)) {

            echo $row ['Item'];
            echo"<br>";
        }
    }
}
?>




