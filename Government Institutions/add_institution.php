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
$name = $_POST['name'];
$wardno = $_POST['wardno'];
$type = $_POST['type'];
$add = $_POST['add'];

$sql = "SELECT * FROM `Government_Institution` WHERE Name = '$name' AND Ward_Number=$wardno";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

   if($count!=1)
   {
     
   $sql1 = "INSERT INTO `Government_Institution` VALUES ('$name',$wardno,$type,$add)";
   mysqli_query($conn,$sql1);
   echo '<script type="text/javascript">alert("Record Added");</script>';
   }
   else
   {
   echo '<script type="text/javascript">alert("Record already exists");</script>';
   }

}

?>
