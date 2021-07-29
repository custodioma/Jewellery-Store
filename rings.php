<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");


if(isset($_GET['ring'])){
    $id = $_GET['ring'];
}else{
    $id = 1;
}


$this_ring_query = "SELECT RName, Price, Material FROM rings WHERE RingID = '" . $id . "'";
$this_ring_result = mysqli_query($con, $this_ring_query);
$this_ring_record = mysqli_fetch_assoc($this_ring_result);

$all_rings_query = "SELECT RingID, RName FROM rings";
$all_rings_result = mysqli_query($con, $all_rings_query);

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
        </ul>
    </nav>
</header>

<main>
    <h2>Ring Information</h2>

    <?php

    echo "<p> Ring Name: " . $this_ring_record['RName'] . "<br>";
    echo "<p> Price: " . $this_ring_record['Price'] . "<br>";
    echo "<p> Material: " . $this_ring_record['Material'] . "<br>";
    ?>
</main>

<main>
    <h2>Select Another Ring</h2>
    <form name='rings_form' id='rings_form' method='get' action='rings.php'>
        <select id='ring' name='ring'>
            <!--options-->
            <?php
            while($all_rings_record = mysqli_fetch_assoc($all_rings_result)){
                echo "<option value = '".$all_rings_record['RingID']."'>";
                echo $all_rings_record['RName'];
                echo"</option>";
            }
            ?>
        </select>
        <input type='submit' name='rings_button' value='Show me the ring information'>
    </form>

</body>

<main>
    <h2>Search a Ring</h2>

    <form action = "" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>
</main>

<?php

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query1 = "SELECT * FROM rings WHERE RName LIKE '%$search%'";
    $query = mysqli_query($con, $query1);
    $count = mysqli_num_rows($query);

    if($count == 0){
        echo "There was no search results!";
    }else{

        while ($row = mysqli_fetch_array($query)) {

            echo $row ['RName'];
            echo"<br>";
        }
    }
}
?>




