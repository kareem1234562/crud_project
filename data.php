<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Bootstrap Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .custom-table thead {
            background-color: #343a40;
            color: #ffffff;
        }
        .custom-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .custom-table th, .custom-table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php 
   
    ?>
    <?php 
    ?>
    
    <div class="container my-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Add</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sea">Search Email</button>
    </form>
  </div>
</nav>
    <!-- <a href="home.php" class="btn btn-dark">Home </a> -->
    <!-- <input type="search"> -->
   
        <table class="table table-striped table-hover custom-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $username="root";
                   $password="";
                   $db=new PDO("mysql:host=localhost;dbname=files;charest=utf8",$username,$password);
                 $name='';
                 $email='';
                 $department='';
                 $password='';
                //    if(isset($_POST['delete']) && isset($_POST['id'])){
                //         $del=$db->prepare("DELETE FROM `crud` WHERE id=:id");
                //         $del->bindParam("id",$_POST['id']);
                //         $del->execute();
                //    }

            //        if(isset($_POST['edit']) && isset($_POST['id'])){
            //         $select_data=$db->prepare("SELECT * FROM `crud` WHERE id=:id");
            //         $select_data->bindParam("id",$_POST['id']);
            //        $select_data->execute();
            //        $arr=$select_data->fetch();
            //        session_start();
            //        header("Location:http://crud.test/update.php");
            //         $_SESSION['name']=$arr['name'];
            //         $_SESSION['email']=$arr['email'];
            //         $_SESSION['department']=$arr['department'];
            //    }

            include("../crud/database.php");
            include("../crud/crud_class.php");
             $obj_sign=new signup($name,$department,$email,$password);
              $obj_sign->go_to_update();
              $obj_sign->delete();

              $search=$db->prepare("SELECT * FROM `crud` WHERE email LIKE :email ");
              $email= @("%".$_POST['search']."%")or die("");
              $search->bindParam("email",$email);
              $search->execute();
               $arr_search= $search->fetchAll();
                   foreach ($arr_search as  $crud):
                    // var_dump($x); // Uncomment this line if you want to see the structure of each row
                ?>
                    <tr>
                     <td><?php echo $crud['id']; ?></td> 
                        <td><?php echo $crud['name']; ?></td>
                        <td><?php echo $crud['department']; ?></td>
                        <td><?php echo $crud['email']; ?></td>
                        <td>
                            <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $crud['id']; ?>">
                            <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                            <button class="btn btn-primary" type="submit" name="edit">Update</button>
                                    
                             <!-- Modal -->
                        </form>
                        </td>
    </div>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
