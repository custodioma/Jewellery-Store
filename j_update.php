<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}

$update_ring = "UPDATE rings SET RName='$_POST[RName]',Price = '$_POST[Price]',Stock = '$_POST[Stock]',Material = '$_POST[Material]' WHERE RingID='$_POST[RingID]'";

if(!mysqli_query($con, $update_ring))
{
  echo 'Not Updated';
}

else
{
    echo 'Updated';
}

header("refresh:2; url = rings.php");
?>