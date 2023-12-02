<?php 
include('./dbcon.php');
if(isset($_GET['dellid']))
{
    $id = $_GET['dellid'];
    $sql ="DELETE FROM `employee_tbl` WHERE `id` = $id";
    if(mysqli_query($con,$sql))
    {
        header('location:./table.php');
    }
}

?>