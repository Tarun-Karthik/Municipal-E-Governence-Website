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
$pwdno = $_POST['pwdno'];
$des = $_POST['des'];
$date = $_POST['date'];
$cont = $_POST['cont'];
$wardno = $_POST['wardno'];

$sql = "SELECT * FROM `Public_Works` WHERE PWD_No = $pwdno AND Situated_in_Ward=$wardno";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

   if($count!=1)
   {
     
   $sql1 = "INSERT INTO `Public_Works` (`PWD_No`, `Description`, `Start_Date`,`Contractor`, `Situated_in_Ward`) VALUES ($pwdno,'$des','$date','$cont',$wardno)";
   mysqli_query($conn,$sql1);
   echo '<script type="text/javascript">alert("Record Added");</script>';
   }
   else
   {
   echo '<script type="text/javascript">alert("Record already exists");</script>';
   }

}

?>
