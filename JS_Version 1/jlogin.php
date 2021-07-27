<?php

$con = mysqli_connect("localhost", "custodioma", 'bentsun82', "custodioma_users");

if(mysqli_connect_errno()){

    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}

else {

    echo "connected to database";

}

?>

<!DOCTYPE html>

<head>

    <title>REGINA'S JEWELLERY</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='jstyle.css'

</head>

<body>
<header>
    <h1>REGINA'S JEWELLERY</h1>
    <nav>
        <ul>
            <a href='regina.php'> HOME </a>
            <a href='rings.php'> RINGS </a>
            <a href='earrings.php'> EARRINGS </a>
            <a href='login.php'>LOGIN</a>
        </ul>
    </nav>
</header>

<h2>Login Here</h2>

<form name='login_form' id='login_form' method = 'post' action= 'process_login.php'>
    <label for= 'username'>Username:</label>
    <input type= 'text' name='username'><br>

    <label for= 'password'>Password:</label>
    <input type= 'text' name = 'password'><br>

    <input type= 'submit' name='submit' id = 'submit' value = 'Log In'>
</form>