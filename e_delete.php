<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_jewellery");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}

$delete_earring = "DELETE FROM earrings WHERE EarringID='$_GET[EarringID]'";

if(!mysqli_query($con, $delete_earring))
{
    echo 'Not Deleted';
}

else
{
    echo 'Deleted';
}

header("refresh:2; url = earrings.php");

?>