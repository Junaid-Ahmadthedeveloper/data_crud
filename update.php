<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    include('./dbcon.php');
    if(isset($_GET['uid']))
    {
        $id = $_GET['uid'];
    }
    
    $sql = "SELECT * FROM `employee_tbl` WHERE `id` = $id";
    $res = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) > 0)
    {
    ?>
  <form class="col-6 mx-auto mt-4" action="edit.php" method="post" enctype="multipart/form-data">
    <h1>Register</h1>
    <input type="hidden" name="id" value="<?php echo $data['id']  ?>">
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="text" name="email" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $data['email'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="" value="<?php echo $data['password'] ?>">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php 
    }
    else{
        header('location:./table.php');
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>