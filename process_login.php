<?php

session_start();

$con = mysqli_connect("localhost", "custodioma", 'bentsun82', "custodioma_jewellery");

$user = trim($_POST['Username']);
$pass = trim($_POST['password']);

$login_query = "SELECT Password FROM users WHERE Username ='". $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

$verify = password_verify($pass, $hash);
if($verify) {
    $_SESSION['logged_in'] = 1;
    header("Location: regina.php");
    echo "Logged in";

}

else{
    header("Location: earrings.php");
    echo "Login unsuccessful";
}

?>
