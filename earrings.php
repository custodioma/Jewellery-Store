<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");


if(isset($_GET['earring'])){
    $id = $_GET['earring'];
}else{
    $id = 1;
}


$this_earring_query = "SELECT EName, Price, Material FROM earrings WHERE EarringID = '" . $id . "'";
$this_earring_result = mysqli_query($con, $this_earring_query);
$this_earring_record = mysqli_fetch_assoc($this_earring_result);

$all_earrings_query = "SELECT EarringID, EName FROM earrings";
$all_earrings_result = mysqli_query($con, $all_earrings_query);

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
    <h2>Earring Information</h2>

    <?php

    echo "<p> Earring Name: " . $this_earring_record['EName'] . "<br>";
    echo "<p> Price: " . $this_earring_record['Price'] . "<br>";
    echo "<p> Material: " . $this_earring_record['Material'] . "<br>";
    ?>
</main>

<main>
    <h2>Select Another Earring</h2>
    <form name='earrings_form' id='earrings_form' method='get' action='earrings.php'>
        <select id='earring' name='earring'>
            <!--options-->
            <?php
            while($all_earrings_record = mysqli_fetch_assoc($all_earrings_result)){
                echo "<option value = '".$all_earrings_record['EarringID']."'>";
                echo $all_earrings_record['EName'];
                echo"</option>";
            }
            ?>
        </select>
        <input type='submit' name='earrings_button' value='Show me the earring information'>
    </form>

</body>

<main>
    <h2>Search An Earring</h2>

    <form action = "" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>
</main>

<?php

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query1 = "SELECT * FROM earrings WHERE EName LIKE '%$search%'";
    $query = mysqli_query($con, $query1);
    $count = mysqli_num_rows($query);

    if($count == 0){
        echo "There was no search results!";
    }else{

        while ($row = mysqli_fetch_array($query)) {

            echo $row ['EName'];
            echo"<br>";
        }
    }
}
?>




