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
   $CheckStatus="SELECT Status FROM Grievances WHERE Complaint_No=$complaintNo AND Ward_No=$ward AND Status='$status'";
    $result1 = mysqli_query($conn,$CheckStatus);
    $count1 = mysqli_num_rows($result1);
    
      if($count1==1)
      {
         $sq = "DELETE FROM `Grievances` WHERE Ward_no=$ward AND Complaint_No=$complaintNo AND Status='$status'";
         mysqli_query($conn,$sq);
         $CheckStatus1="SELECT Status FROM `Grievances` WHERE Complaint_No=$complaintNo AND Ward_No=$ward";
         $result2 = mysqli_query($conn,$CheckStatus1);
         $count2 = mysqli_num_rows($result2);
         if($count2==0)
         echo '<script type="text/javascript">alert("Grievance deleted");</script>';
         else
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      else
      {
          echo '<script type="text/javascript">alert("Cannot Delete Grievance");</script>';
      }
   }
   else
   {
   echo '<script type="text/javascript">alert("Wrong Password");</script>';
   }

}

?>
