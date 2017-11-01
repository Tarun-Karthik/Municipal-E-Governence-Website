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

$result = mysqli_query($connection,"SELECT * FROM Public_Works");

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
<th>PWD No</th>
<th>Description</th>
<th>Start Date</th>
<th>Tentative Deadline</th>
<th>Contractor</th>
<th>Estimated Cost (in crores)</th>
<th>Status</th>
<th>Situated in</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['PWD_No'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Start_Date'] . "</td>";
echo "<td>" . $row['Tentative_Deadline'] . "</td>";
echo "<td>" . $row['Contractor'] . "</td>";
echo "<td>" . $row['Estimated_Cost_incrores'] . "</td>";
echo "<td>" . $row['Status'] . "</td>";
echo "<td>" . $row['Situated_in_Ward'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
?>

</body>
</html>
