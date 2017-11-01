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
    $funds = $_POST['funds'];
    $noofpeople = $_POST['noofpeople'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $incharge = $_POST['incharge'];
    $addupdate = $_POST['adddlete'];
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
        if($addupdate=="Add")
        {
           $sql2 = "SELECT * FROM `Social_Schemes` WHERE Scheme_name='$name'";
           $result2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($result2);
           
           if($count2!=1)
               {
                $sql = "INSERT INTO `Social_Schemes`(`Funds_Allocated_(in_lakhs)`,`No_of_people_benefited_(in_lakhs)`, `Inception_date`,`Scheme_name`,`Representative_in_charge`,`Intiated_by_dept`) VALUES ($funds,$noofpeople,'$date','$name','$incharge','$dept')";
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
           $sql2 = "SELECT * FROM `Social_Schemes` WHERE Scheme_name='$name'";
           $result2 = mysqli_query($conn,$sql2);
           $count2 = mysqli_num_rows($result2);
           
           if($count2==1)
               {
                $sql = "UPDATE `Social_Schemes` SET `Funds_Allocated_(in_lakhs)`=$funds,`No_of_people_benefited_(in_lakhs)`=$noofpeople,`Inception_date`='$date',`Representative_in_charge`='$incharge' WHERE Scheme_name='$name'";
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
