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
$type=$_POST['type'];
$result = mysqli_query($connection,"SELECT * FROM Government_Institution WHERE Ward_Number=$ward AND Type='$type'");

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

echo "<table>
<tr>
<th>Name</th>
<th>Ward_Number</th>
<th>Type</th>
<th>Address</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Ward_Number'] . "</td>";
echo "<td>" . $row['Type'] . "</td>";
echo "<td>" . $row['Address'] . "</td>";
echo "</tr>";
}
echo "</table>";
}
/* CLOSE CONNECTION */
mysqli_close($connection);

?>
