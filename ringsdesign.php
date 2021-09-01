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

// Query to order rings from A to Z in the table
$rings_AtoZ = "SELECT * FROM rings ORDER BY RName ASC";
// Query to order rings from Z to A in the table
$rings_ZtoA = "SELECT * FROM rings ORDER BY IName DESC";
// Query to order rings from the lowest to highest price
$rings_price_low_to_high = "SELECT * FROM rings ORDER BY Price ASC";
// Query to order the rings from the highest to lowest price
$rings_price_high_to_low = "SELECT * FROM rings ORDER BY Price DESC";
// Query to display the rings that are in stock
$rings_in_stock = "SELECT * FROM rings WHERE Stock > 0";
// Query to display the rings that are out of stock
$rings_out_of_stock = "SELECT * FROM rings WHERE Stock = 0";
// Query to display the rings that are silver
$rings_silver = "SELECT * FROM rings WHERE Material = 'Silver'";
// Query to display the rings that are rose gold
$rings_rose_gold = "SELECT * FROM rings WHERE Material = 'Rose Gold'";
// Query to display the rings that are gold
$rings_gold = "SELECT * FROM rings WHERE Material = 'Gold'";

$update_rings = "SELECT * FROM rings";
$update_rings_record = mysqli_query($con, $update_rings);

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
    <div class="topnav">
        <a href='regina.php'> HOME </a>
        <a href='ringsdesign.php'> RINGS </a>
        <a href='earrings.php'> EARRINGS </a>
        <a href='sales.php'> SALES </a>
        <a href='jlogin.php'>LOGIN</a>
        <a href='update_information.php'>UPDATE INFO</a>
    </div>
</header>


    <main>
        <h2>Search a Ring</h2>

        <form action = "" method="post">
            <input type="text" name='search'>
            <input type="submit" name="submit" value="Search">
        </form>
        <br>
        <br>
    </main>




<?php

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query1 = "SELECT * FROM rings WHERE RName LIKE '%$search%'";
    $query = mysqli_query($con, $query1);
    $count = mysqli_num_rows($query);

    if($count == 0){
        echo "There were no search results!";
    }else{

        while ($row = mysqli_fetch_array($query)) {

            echo "<p>". $row ['RName'];
            echo"<br>";
        }
    }
}
?>


<div class="section divider-rings" alt="ring photo collage"></div>
<div class="section"></div>
<div class="container"></div>


<div class="container1">
    <main>
        <h2>Ring Information</h2>

        <?php

        echo "<p> Ring Name: " . $this_ring_record['RName'] . "<br>";
        echo "<p> Price: " . $this_ring_record['Price'] . "<br>";
        echo "<p> Material: " . $this_ring_record['Material'] . "<br>";
        ?>
    </main>
</div>

<div class="container2">
    <main>
        <h2>Select Another Ring</h2>
        <br>
        <br>
        <form name='rings_form' id='rings_form' method='get' action='ringsdesign.php'>
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
    </main>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container3">
    <main>
        <h2> Rings Available</h2>

        <p>Display all the rings available by sorting them using the buttons
            <br>
            <br>

            Sort by:
        </p>


        <form action="ringsdesign.php" method="post">
            <input type='submit' name='rings_AtoZ' value="From A-Z">
            <input type='submit' name='rings_ZtoA' value="From Z-A">
            <input type='submit' name='rings_price_low_to_high' value="Price Low to High">
            <input type='submit' name='rings_price_high_to_low' value="Price High to Low">
            <input type='submit' name='in_stock' value="In Stock">
            <input type='submit' name='out_stock' value="Out of Stock">
            <input type='submit' name='silver' value="Silver Rings">
            <input type='submit' name='rose_gold' value="Rose Gold Rings">
            <input type='submit' name='gold' value="Gold Rings">
        </form>


        <table style="width:75%">
            <tr>
                <th>Ring Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Material</th>
            </tr>

            <?php
            if (isset($_POST['rings_AtoZ'])) {
                $result = mysqli_query($con, "SELECT * FROM rings ORDER BY RName ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['rings_ZtoA'])) {
                $result = mysqli_query($con, "SELECT * FROM rings ORDER BY RName DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['rings_price_low_to_high'])) {
                $result = mysqli_query($con, "SELECT * FROM rings ORDER BY Price ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>


            <?php
            if (isset($_POST['rings_price_high_to_low'])) {
                $result = mysqli_query($con, "SELECT * FROM rings ORDER BY Price DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['in_stock'])) {
                $result = mysqli_query($con, "SELECT * FROM rings WHERE Stock > 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['out_stock'])) {
                $result = mysqli_query($con, "SELECT * FROM rings WHERE stock = 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['silver'])) {
                $result = mysqli_query($con, "SELECT * FROM rings WHERE Material = 'Silver'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['rose_gold'])) {
                $result = mysqli_query($con, "SELECT * FROM rings WHERE Material = 'Rose Gold'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['gold'])) {
                $result = mysqli_query($con, "SELECT * FROM rings WHERE Material = 'Gold'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['RingID'];
                        echo "<tr>";
                        echo "<td>" . $test['RName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </main>
</div>
<br>
<br>
<br>
<div class="update_link">
    <a href="update_information.php">Update ring information here!</a>
</div>

</body>

</html>
