<?php
//echo "Entered PHP";
/* CONNECTING TO THE DATABASE */
$servername = "localhost";
$username = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";
$password = "tarunkarthik";
$dbname = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

//echo "Done Connecting";
/* EXECUTING QUERY ON THE DATABASE AND GATHERING RESULTS */

if($_POST)
{
$ward = $_POST['wardno'];
//echo $ward;
$result = mysqli_query($connection,"SELECT * FROM `Grievances` WHERE Ward_No='$ward'");

/* DISPLAY RESULTS ON THE WEB PAGE */
echo "
<!DOCTYPE html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>

<body>";

echo "<table border='1'>
<tr>
<th>Complaint No</th>
<th>Complaint Description</th>
<th>Complainant</th>
<th>Status</th>
<th>Ward no</th>
<th>Department in Charge</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Complaint_No'] . "</td>";
echo "<td>" . $row['Complaint_Description'] . "</td>";
echo "<td>" . $row['Complainant'] . "</td>";
echo "<td>" . $row['Status'] . "</td>";
echo "<td>" . $row['Ward_No'] . "</td>";
echo "<td>" . $row['Looked_into_by_dept'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
}
?>
