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
$ward = $_POST['wardno'];
$complaintNo = $_POST['complaint'];
$password = $_POST['password'];


$sql = "SELECT * FROM `department_login` WHERE password = '$password'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$status = "Redressed";

   if($count==1)
   {
     $res=mysqli_fetch_assoc(mysqli_query($conn,$sql));
     $dept=$res['department'];
     
   $sql1 = "UPDATE `Grievances` SET `Status`='$status',`Looked_into_by_dept`='$dept' WHERE Ward_no=$ward AND Complaint_No=$complaintNo";
   mysqli_query($conn,$sql1);
   echo '<script type="text/javascript">alert("Status Updated");</script>';
   }
   else
   {
   echo '<script type="text/javascript">alert("Wrong Password");</script>';
   }

}

?>
