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

$result = mysqli_query($connection,
"SELECT g.Complaint_Description AS Complaint,
(SELECT Name FROM Ward WHERE Number=g.Ward_No) AS `Against Ward`,
(SELECT HOD FROM Government_Department WHERE g.Looked_into_by_dept=Name) AS `Responsible Person`
FROM Grievances g"
);

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
<th>Complaint</th>
<th>Against Ward</th>
<th>Responsible Person</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Complaint'] . "</td>";
echo "<td>" . $row['Against Ward'] . "</td>";
echo "<td>" . $row['Responsible Person'] . "</td>";
echo "</tr>";
}

mysqli_close($connection);
?>

</body>
</html>
