<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center mt-4">Update</h2>
    <form method="post" action="" class="container mt-3">

    <div class="form-group">
    <label for="exampleInputEmail1">username </label>
    <input value="<?php session_start(); echo $_SESSION['name']?>" type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail2">Department</label>
    <input value="<?php  echo $_SESSION['department']?>" type="text" class="form-control" id="exampleInputEmail2" name="department" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail3">Email readonly</label>
    <input value="<?php  echo $_SESSION['email']?>" type="email" name="email" class="form-control" id="exampleInputEmail3" readonly name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <br>
  
  <button type="submit" name="sure2" class="btn btn-primary">Update</button>
  <a href="home.php" class="btn btn-dark">Home</a>
</form>
</body>
</html>
<?php 
  $name='';
  $email='';
  $department='';
  $password='';
 
   include("../crud/database.php");
   include("../crud/crud_class.php");
    $obj_sign=new signup($name,$department,$email,$password);
     $obj_sign->empty_update();
  

// $username="root";
// $password="";
// $db=new PDO("mysql:host=localhost;dbname=files;charest=utf8",$username,$password);



// if(isset($_POST['sure2'])){
//     $select_data=$db->prepare("SELECT * FROM `crud` WHERE email=:email ");
//     $select_data->bindParam("email",$_POST['email']);
//     $select_data->execute();
//     $email_sel=$select_data->fetchObject();

//     $select_data=$db->prepare("UPDATE `crud` SET name=:name,department=:department WHERE email=:email ");
//     $select_data->bindParam("email",$_POST['email']);
//     $select_data->bindParam("name",$_POST['username']);
//     $select_data->bindParam("department",$_POST['department']);
//     $select_data->execute();


// }



?>