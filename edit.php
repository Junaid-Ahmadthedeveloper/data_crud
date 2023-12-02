<?php 
include('./dbcon.php');

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "UPDATE `employee_tbl` SET `email`='{$email}',`password`='{$pass}' WHERE `id` = $id";
    // print_r($sql);
    if(mysqli_query($con,$sql))
    {
        header('location:./table.php');
    }
    }
?>