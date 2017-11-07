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

$result = mysqli_query($connection,"
SELECT `Initiated_by_dept` AS dept, SUM(`Funds_Allocated_(in_lakhs)`) AS funds, SUM(`No_of_people_benefited_(in_lakhs)`) AS people
FROM Social_Schemes
GROUP BY `Initiated_by_dept`
ORDER BY `No_of_people_benefited_(in_lakhs)`
");

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
<th>Department</th>
<th>Aggregate Funds Allocated</th>
<th>Total number of people benefited</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['dept'] . "</td>";
echo "<td>" . $row['funds'] . "</td>";
echo "<td>" . $row['people'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
?>

</body>
</html>
