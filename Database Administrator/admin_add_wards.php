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
$wnumber = $_POST['wnumber'];
$wname = $_POST['wname'];

$sql  = "INSERT INTO `Ward` VALUES ('$wnumber','$wname')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("New ward has been successfully registered");</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>
