<?php

$con = mysqli_connect("localhost", "custodioma", 'bentsun82', "custodioma_jewellery");

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
    <link rel='stylesheet' type='text/css' href='jstyle.css'>

</head>

<body>
<header>
    <h1>REGINA'S JEWELLERY</h1>
    <nav>
        <div class="topnav">
            <a href='regina.php'> HOME </a>
            <a href='ringsdesign.php'> RINGS </a>
            <a href='earrings.php'> EARRINGS </a>
            <a href='sales.php'> SALES </a>
            <a href='login.php'>LOGIN</a>
            <a href='update_information.php'>UPDATE INFO</a>
        </div>
    </nav>
</header>


<div class="container1">
    <main>
        <h2>Login Here</h2>
        <p>Admin users, log in here!</p>
        <!-- Login Form-->
        <form name='login_form' id='login_form' method = 'post' action ='process_login.php'>
            <label for="Username">Username:</label>
            <input type='text' name="Username"><br>

            <label for="password">Password:</label>
            <input type='password' name='password'><br>

            <input type='submit' name='submit' id='submit' value="Log In">
        </form>
    </main>
</div>


<div class container="container2">
    <main>
        <h2>Sign up to be a member!</h2>

        <p>Have access to the latest news and sales by signing up here!</p>

        <form action="member_insert.php" method="post">

            First Name: <input type ="text" name="FName"><br>
            Last Name : <input type ="text" name="LName"><br>
            Email: <input type = "text" name ="Email"><br>

            <input type ="submit" value ="Insert">

        </form>
    </main>
</div>
</body>