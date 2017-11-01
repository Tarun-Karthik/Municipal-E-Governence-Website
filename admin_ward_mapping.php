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
$erid = $_POST['erid'];
$wnumber = $_POST['wnumber'];

$sql  = "INSERT INTO `ER Ward Mapping` VALUES ('$wnumber','$erid')";

if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Update successful");</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>
