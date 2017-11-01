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

$result = mysqli_query($connection,"SELECT * FROM Government_Department");

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
<th>HOD</th>
<th>Name</th>
<th>Email_ID</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['HOD'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Email_ID'] . "</td>";
echo "</tr>";
}

mysqli_close($connection);
?>

</body>
</html>
