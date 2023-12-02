<?php 
include('./dbcon.php');

$emailerror ="";
$passerror ="";
$imgerror ="";
$suuces = "";

if(isset($_POST['submit']))
{
    $email = htmlspecialchars($_POST['email']);
    $pass  = htmlspecialchars($_POST['password']);

   if (empty($email))  
   {
  $emailerror = "Enter your Email...";
   } 
   elseif(empty($pass))
   {
    $passerror =   "Enter your Password...";
   }
   elseif($_FILES['file']['error'] != 0)
   {
    $imgerror =   "Select image First...";
   }
   else {
    // $suuces = "Submited";
    $imagename   = $_FILES['file']['name'];
    $tmpname     = $_FILES['file']['tmp_name'];
    $ext         = explode('.',$imagename);
    $extension   = strtolower(end($ext));
    $allowed_ext = ["jpg","jpeg","png"];

    if(in_array($extension,$allowed_ext))
    {
      
      $imgname = rand(29999,599999999)."Aci_programer".microtime().$imagename;
    // echo microtime();
      $upload_folder = './images/'.$imgname;

      if(move_uploaded_file($tmpname,$upload_folder))
      {
        $sql = "INSERT INTO `employee_tbl`(`email`, `password`, `image`) VALUES ('{$email}','{$pass}','{$upload_folder}')";
      
      if(mysqli_query($con,$sql))
       {
        header('location:./table.php');
        $suuces = "submitted";
       }
       else{
        $suuces = "Not  submitted";
       }
      }
    }
    else{
      $imgerror =   "Please Select Valid image...";
    }
    // echo $extension;
//  print_r($ext);

   }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <a href="./table.php" class="btn btn-info">Table</a>
  <form class="col-6 mx-auto mt-4" action="<?php echo  $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <h1>Register</h1>
  <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="text" name="email" class="form-control" id="" aria-describedby="emailHelp">
      <p class="text-danger"><?php echo $emailerror  ?></p>
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="">
    <p class="text-danger"><?php echo $passerror  ?></p>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Chose Image</label>
    <input type="file" name="file" class="form-control" id="">
    <p class="text-danger"><?php echo $imgerror  ?></p>
  </div>
  <p class="text-info"><?php echo $suuces ?></p>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>