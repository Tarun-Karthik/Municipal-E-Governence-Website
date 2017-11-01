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

$result = mysqli_query($connection,"SELECT * FROM `Social_Schemes`");

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
<th>Funds Allocated (in Lakhs)</th>
<th>No. of people benefited (in Lakhs)</th>
<th>Inception Date</th>
<th>Scheme Name</th>
<th>Representative in Charge</th>
<th>Initiated by Dept</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Funds_Allocated_(in_lakhs)'] . "</td>";
echo "<td>" . $row['No_of_people_benefited_(in_lakhs)'] . "</td>";
echo "<td>" . $row['Inception_date'] . "</td>";
echo "<td>" . $row['Scheme_name'] . "</td>";
echo "<td>" . $row['Representative_in_charge'] . "</td>";
echo "<td>" . $row['Initiated_by_dept'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
?>

</body>
</html>
