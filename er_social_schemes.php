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
SELECT er.`First name`,er.`Middle Name`,er.`Last Name`,ss.Scheme_name
FROM Elected_Representative er INNER JOIN Social_Schemes ss 
ON er.`Representative ID`=ss.`Representative_in_charge`
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
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Scheme Name</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['First name'] . "</td>";
echo "<td>" . $row['Middle Name'] . "</td>";
echo "<td>" . $row['Last Name'] . "</td>";
echo "<td>" . $row['Scheme_name'] . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($connection);
?>

</body>
</html>
