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
$ward = $_POST['wardno'];
$complaint = $_POST['complaint'];

$value=mysqli_fetch_row(mysqli_query($conn,"SELECT MAX(Complaint_No) FROM Grievances WHERE Ward_No=$ward"));
$ComplaintNo=$value[0]+1;

$sql  = "INSERT INTO `Grievances` (Complaint_No,`Complaint_Description`,`Complainant`,`Ward_No`) VALUES ('$ComplaintNo','$complaint','$name','$ward')";


if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Data has been submitted.Your complaint no. is '.$ComplaintNo.'");</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

?>
