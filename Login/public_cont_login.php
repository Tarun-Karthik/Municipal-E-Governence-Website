<?php
$servername = "localhost";
$username = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";
$password = "tarunkarthik";
$dbname = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($_POST)
{
$uname = mysqli_real_escape_string($conn,$_POST['uname']);

$psw = mysqli_real_escape_string($conn,$_POST['psw']);


$sql = "SELECT * FROM `contractor_login` WHERE username = '$uname' AND password = '$psw'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);


if($count==1)
{
header("location: https://egovernence.000webhostapp.com/Public-Contractor/");
exit;
}
else
{
echo '<script type="text/javascript">alert("Login credential false");</script>';
}
}

?>
