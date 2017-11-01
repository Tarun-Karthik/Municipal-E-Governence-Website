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

$res=mysqli_fetch_assoc(mysqli_query($conn,"SELECT Status FROM Grievances WHERE Ward_No=$ward AND Complaint_No=$complaintNo"));
$status=$res['Status'];
echo '<script type="text/javascript">alert("Your grievance status is: '.$status.'");</script>';

}

?>
