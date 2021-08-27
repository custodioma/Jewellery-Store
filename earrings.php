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

// Query to order rings from A to Z in the table
$earrings_AtoZ = "SELECT * FROM earrings ORDER BY EName ASC";
// Query to order rings from Z to A in the table
$earrings_ZtoA = "SELECT * FROM earrings ORDER BY EName DESC";
// Query to order rings from the lowest to highest price
$earrings_price_low_to_high = "SELECT * FROM earrings ORDER BY Price ASC";
// Query to order the rings from the highest to lowest price
$earrings_price_high_to_low = "SELECT * FROM earrings ORDER BY Price DESC";
// Query to display the rings that are in stock
$earrings_in_stock = "SELECT * FROM earrings WHERE Stock > 0";
// Query to display the rings that are out of stock
$earrings_out_of_stock = "SELECT * FROM earrings WHERE Stock = 0";
// Query to display the rings that are silver
$earrings_silver = "SELECT * FROM earrings WHERE Material = 'Silver'";
// Query to display the rings that are rose gold
$earrings_rose_gold = "SELECT * FROM earrings WHERE Material = 'Rose Gold'";
// Query to display the rings that are gold
$earrings_gold = "SELECT * FROM earrings WHERE Material = 'Gold'";

$update_earrings = "SELECT * FROM earrings";
$update_earrings_record = mysqli_query($con, $update_earrings);
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
            <a href='sales.php'> SALES </a>
            <a href='jlogin.php'>LOGIN</a>
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

    <hr>

    <main>
        <h2>Select another earring</h2>
        <p> Select another item to view the display its information above!</p>
        <br>
        <form name='earrings_form' id='earrings_form' method='get' action='earrings.php'>
            <select id='earring' name='earring'>
                <!--options-->
                <?php
                while ($all_earrings_record = mysqli_fetch_assoc($all_earrings_result)) {
                    echo "<option value = '" . $all_earrings_record['EarringID'] . "'>";
                    echo $all_earrings_record['EName'];
                    echo "</option>";
                }
                ?>
            </select>
            <input type='submit' name='earrings_button' value='Show me the earring information'>
        </form>
        <br>
        

        <h2>Search an Earring</h2>
        <p> Search an item </p>

        <form action="" method="post">
            <input type="text" name='search'>
            <input type="submit" name="submit" value="Search">
        </form>
    </main>



    <?php

    if (isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM earrings WHERE EName LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if ($count == 0) {
            echo "There was no search results!";
        } elseif ($search == "") {
            echo "There was no search results";
        } else {

            while ($row = mysqli_fetch_array($query)) {

                echo $row ['EName'];
                echo "<br>";
            }
        }
    }
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h2> Earrings Available</h2>

    <p>Display all the items available by sorting them out using the buttons
        <br><br>Sort by:
    </p>

    <form action="earrings.php" method="post">
        <input type='submit' name='earrings_AtoZ' value="From A-Z">
        <input type='submit' name='earrings_ZtoA' value="From Z-A">
        <input type='submit' name='earrings_price_low_to_high' value="Price Low to High">
        <input type='submit' name='earrings_price_high_to_low' value="Price High to Low">
        <input type='submit' name='in_stock' value="In Stock">
        <input type='submit' name='out_stock' value="Out of Stock">
        <input type='submit' name='earrings_silver' value="Silver Earrings">
        <input type='submit' name='earrings_rose_gold' value="Rose Gold Earrings">
        <input type='submit' name='earrings_gold' value="Gold Earrings">
    </form>


        <table style="width:75%">
            <tr>
                <th>Item Name</th>
                <th>Cost</th>
                <th>Stock</th>
                <th>Material</th>
            </tr>

            <?php
            if (isset($_POST['earrings_AtoZ'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings ORDER BY EName ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST['earrings_ZtoA'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings ORDER BY EName DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['earrings_price_low_to_high'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings ORDER BY Price ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>


            <?php
            if (isset($_POST['earrings_price_high_to_low'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings ORDER BY Price DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
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
                $result = mysqli_query($con, "SELECT * FROM earrings WHERE Stock > 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
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
                $result = mysqli_query($con, "SELECT * FROM earrings WHERE Stock = 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST['earrings_silver'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings WHERE Material = 'Silver'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST['earrings_rose_gold'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings WHERE Material = 'Rose Gold'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST['earrings_gold'])) {
                $result = mysqli_query($con, "SELECT * FROM earrings WHERE Material = 'Gold'");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['EarringID'];
                        echo "<tr>";
                        echo "<td>" . $test['EName'] . "</td>";
                        echo "<td>" . $test['Price'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "<td>" . $test['Material'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
    </table>

        <hr>

        <main>
            <h2> Add an Earring</h2>

            <form action="e_insert.php" method="post">

                Earring ID: <input type ="text" name="EarringID"><br>
                Earring Name : <input type ="text" name="EName"><br>
                Price: <input type = "text" name ="Price"><br>
                Stock: <input type = "text" name ="Stock"><br>
                Material: <input type = "text" name ="Material"><br>
                Description: <input type = "text" name ="Description"><br>
                <input type ="submit" value ="Insert">

            </form>
    </main>

    <hr>
    <main>
        <h2>Update Earrings</h2>
        <table>
            <tr>
                <th>Earring</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Material</th>
                <th>Submit</th>
                <th>Delete</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($update_earrings_record))
            {
                echo "<tr><form action = e_update.php method = post>";
                echo "<td><input type=text name=EName value='" .$row['EName']. "'></td>";
                echo "<td><input type=text name=Price value='" .$row['Price']. "'></td>";
                echo "<td><input type=text name=Stock value='" .$row['Stock']. "'></td>";
                echo "<td><input type=text name=Material value='" .$row['Material']. "'></td>";
                echo "<input type=hidden name=EarringID value='" .$row['EarringID']. "'>";
                echo "<td><input type =submit></td>";
                echo "<td><a href=e_delete.php?EarringID="  .$row['EarringID'].  ">Delete</a></td>";
                echo "</form></tr>";
            }
            ?>
        </table>

    </main>
    </body>
    </html>








