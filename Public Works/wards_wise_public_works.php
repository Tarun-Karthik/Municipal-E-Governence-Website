<?php

/* CONNECTING TO THE DATABASE */
$servername = "localhost";
$username = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";
$password = "tarunkarthik";
$dbname = "id2963861_wp_2be0db2d9519ee3205bea03d32c84df8";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

/* EXECUTING QUERY ON THE DATABASE AND GATHERING RESULTS */

if($_POST)
{
$ward = $_POST['wardno'];
$result = mysqli_query($connection,"SELECT * FROM `Public_Works` WHERE Situated_in_Ward='$ward'");

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
<th>Contractor</th>
<th>Description</th>
<th>Estimated Cost (in crores)</th>
<th>PWD No</th>
<th>Situated in Ward</th>
<th>Start Date</th>
<th>Status</th>
<th>Tentative Deadline</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Contractor'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Estimated_Cost_incrores'] . "</td>";
echo "<td>" . $row['PWD_No'] . "</td>";
echo "<td>" . $row['Situated_in_Ward'] . "</td>";
echo "<td>" . $row['Start_Date'] . "</td>";
echo "<td>" . $row['Status'] . "</td>";
echo "<td>" . $row['Tentative_Deadline'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
}
?>
