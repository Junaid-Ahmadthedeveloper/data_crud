<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <table class="table">
<?php  
include('./dbcon.php');
$sql = "SELECT * FROM `employee_tbl`";
$res =   mysqli_query($con,$sql);
// print_r($res);
if(mysqli_num_rows($res) > 0)
{
?>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
 <?php 
 
}
else
{
  echo "No record Found";
}
 ?>
  <tbody>
<?php 
while($data =  mysqli_fetch_assoc($res))
{
 
// echo "<pre>";
// print_r($data);
// echo "</pre>";

?>
    <tr>
      <td><?php  echo $data['id']  ?></td>
      <td><?php  echo $data['email']  ?></td>
      <td><?php  echo $data['password']  ?></td>
      <td><img src="<?php echo $data['image']  ?>" height="150px" width="150px" alt=""></td>
      <td><?php  echo $data['created']  ?></td>
      <td>
        <a href="./delete.php?dellid=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
        <a href="./update.php?uid=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
      </td>
    </tr>
    <?php 
}
    
    ?>
  </tbody>
</table>
<a href="./index.php" class="btn btn-info">Form</a>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>