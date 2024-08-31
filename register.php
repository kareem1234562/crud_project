<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center mt-4">Add a New</h2>
    <form method="post" action="" class="container mt-3">

    <div class="form-group">
    <label for="exampleInputEmail1">username </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail2">Department</label>
    <input type="text" class="form-control" id="exampleInputEmail2" name="department" aria-describedby="emailHelp" placeholder="Enter email" >
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail3" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <br>
  <button type="submit" name="sure" class="btn btn-primary">Add</button>
  <!-- <a href="home.php" class="btn btn-dark">Home</a> -->
</form>
</body>
</html>

<?php 
include("../crud/database.php");
include("../crud/crud_class.php");
// include("../crud/register.php");
if(isset($_POST['sure'])){
    $name=$_POST['username'];
    $department=$_POST['department'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $obj_sign=new signup($name,$department,$email,$password);
    $obj_sign->empty();
}
?>