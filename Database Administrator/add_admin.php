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
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname=$_POST['lname'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$Designation=$_POST['Designation'];
$party=$_POST['party'];
$emailID=$_POST['emailID'];
$dept=$_POST['dept'];

$value=mysqli_fetch_row(mysqli_query($conn,"SELECT MAX(`Representative ID`) FROM Elected_Representative WHERE Designation='$Designation'"));
$RepID=$value[0]+1;

$sql  = "INSERT INTO `Elected_Representative` VALUES ('$fname','$mname','$lname','$sdate','$edate','$Designation','$party','$RepID','$emailID','$dept')";


if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("Elected Representative ahs been registered. Representative ID is '.$RepID.' ");</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

?>
