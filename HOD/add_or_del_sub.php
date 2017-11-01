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
    $dept = $_POST['dept'];
    $sub = $_POST['sub'];
    $oper = $_POST['adddelete'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `department_login` WHERE password = '$password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count!=1)
    {
        echo '<script type="text/javascript">alert("Wrong Password");</script>';
    }
    else
    {
        if($oper=="Add")
        {
           $sql2 = "SELECT * FROM `Govt_Sub_Departments` WHERE Sub_dept_name='$sub' AND Govt_Dept_Name='$dept'";
           $result2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($result2);
           if($count2!=1)
           {
                $sql = "INSERT INTO `Govt_Sub_Departments`(`Sub_dept_name`, `Govt_Dept_Name`) VALUES ('$sub','$dept')";
                $result4 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("Sub department added");</script>';
           }
           else
           {
               echo '<script type="text/javascript">alert("Sub department already exists");</script>';
           }
        }
        else
        {
           $sql = "SELECT * FROM `Govt_Sub_Departments` WHERE Sub_dept_name='$sub' AND Govt_Dept_Name='$dept'";
           $result3 = mysqli_query($conn,$sql);
           $count2 = mysqli_num_rows($result3);
           if($count2!=1)
           {
               echo '<script type="text/javascript">alert("Sub department does not exist");</script>';
           }
           else
           {
                $sql = "DELETE FROM `Govt_Sub_Departments` WHERE Sub_dept_name='$sub' AND Govt_Dept_Name='$dept'";
                $result5 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("sub department deleted");</script>';
           }
        }
    }
}

?>
