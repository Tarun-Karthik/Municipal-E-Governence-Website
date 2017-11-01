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
$pwd = $_POST['pwd'];
$deadline = $_POST['deadline'];
$ward = $_POST['ward'];


$sql = "SELECT * FROM `Public_Works` WHERE PWD_No = $pwd AND Situated_in_Ward=$ward";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

   if($count==1)
   {
     
   $sql1 = "UPDATE `Public_Works` SET `Tentative_Deadline`='$deadline' WHERE PWD_No = $pwd AND Situated_in_Ward=$ward";
   mysqli_query($conn,$sql1);
   echo '<script type="text/javascript">alert("Status Updated");</script>';
   }
   else
   {
   echo '<script type="text/javascript">alert("Work does not exist");</script>';
   }

}

?>
