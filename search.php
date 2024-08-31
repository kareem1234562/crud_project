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
                <form action="" method="post">
                <input type="text" name="search" id="" >
                <button type="submit" name="sea">sss</button>
            </form>

                <?php 
                   $username="root";
                   $password="";
                   $db=new PDO("mysql:host=localhost;dbname=files;charest=utf8",$username,$password);

            
                $search=$db->prepare("SELECT * FROM `crud` WHERE email LIKE :email ");
                $email= @("%".$_POST['search']."%")or die("");
                $search->bindParam("email",$email);
                $search->execute();
                session_start();
                 $arr_search= $search->fetchAll();
                 
                   foreach ( $arr_search as  $crud):
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