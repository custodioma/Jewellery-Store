<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}

$delete_ring = "DELETE FROM rings WHERE RingID='$_GET[RingID]'";

if(!mysqli_query($con, $delete_ring))
{
    echo 'Not Deleted';
}

else
{
    echo 'Deleted';
}

header("refresh:2; url = rings.php");

?>