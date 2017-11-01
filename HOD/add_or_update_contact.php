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
    $email = $_POST['email'];
    $number = $_POST['number'];
    $addupdate = $_POST['adddelete'];
    $password = $_POST['password'];
    $hod = $_POST['HOD'];


    $sql = "SELECT * FROM `department_login` WHERE password = '$password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count!=1)
    {
        echo '<script type="text/javascript">alert("Wrong Password");</script>';
    }
    else
    {
        if($addupdate=="Add")
        {
           $sql2 = "SELECT * FROM `Government_Department` WHERE Name='$dept'";
           $result2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($result2);
           
           if($count2!=1)
               {
                $sql = "INSERT INTO `Government_Department`(`HOD`,`Name`, `Govt_Dept_Name`) VALUES ('$hod','$dept','$email')";
                $result4 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("record added");</script>';   
               }
               else
               {
                 echo '<script type="text/javascript">alert("record already exists");</script>';  
               }
           
           $sql3 = "SELECT * FROM `Govt_Dept_Office_Nos` WHERE Govt_Dept_Name='$dept'";
           $result3 = mysqli_query($conn,$sql3);
           $count3 = mysqli_num_rows($result3);
           if($count3!=1)
               {
                $sql = "INSERT INTO `Govt_Dept_Office_Nos`(`OFfice_No`,`Govt_Dept_Name`) VALUES ('$number','$dept')";
                $result4 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("record added");</script>';   
               }
               else
               {
                 echo '<script type="text/javascript">alert("record already exists");</script>';  
               }
        }
        else
        {
           $sql2 = "SELECT * FROM `Government_Department` WHERE Name='$dept'";
           $result2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($result2);
           
           if($count2==1)
               {
                $sql = "UPDATE `Government_Department` SET `HOD`='$hod',`Email_ID`='$email' WHERE `Name`='$dept'";
                $result4 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("record added");</script>';   
               }
               else
               {
                 echo '<script type="text/javascript">alert("record already exists");</script>';  
               }
           
           $sql3 = "SELECT * FROM `Govt_Dept_Office_Nos` WHERE Govt_Dept_Name='$dept'";
           $result3 = mysqli_query($conn,$sql3);
           $count3 = mysqli_num_rows($result3);
           if($count3==1)
               {
                $sql = "UPDATE `Govt_Dept_Office_Nos` SET `Office_No`='$number' WHERE Govt_Dept_Name='$dept'";
                $result4 = mysqli_query($conn,$sql);
                echo '<script type="text/javascript">alert("record updated");</script>';   
               }
               else
               {
                 echo '<script type="text/javascript">alert("record does not exists");</script>';  
               }
        }
    }
}

?>
