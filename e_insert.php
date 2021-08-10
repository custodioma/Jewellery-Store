<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}

$EarringID = $_POST['EarringID'];
$EName = $_POST['EName'];
$Price = $_POST['Price'];
$Stock = $_POST['Stock'];
$Material = $_POST['Material'];
$Description = $_POST['Description'];

$insert_ring = "INSERT INTO earrings (EarringID,EName,Price,Stock,Material,Description) VALUES ('$EarringID', '$EName', '$Price', '$Stock', '$Material','$Description')";

if(!mysqli_query($con, $insert_ring))
{
    echo 'Not Inserted';
}

else
{
    echo 'Inserted';
}

header("refresh:2; url = rings.php");