
<?php 
class signup extends database{      // اعمل اوبجيكت من الداتا بيز وجرب
    public $name2;
    public $email2;
    public $dapartment2;
    public $name;
public $email;
public $dapartment;
public $password;
    function __construct($name,$dapartment,$email,$password){
   $this->name=$name;
   $this->dapartment=$dapartment;
   $this->email=$email;
   $this->password=$password;     
    }
     function empty(){
        $con=$this->connect_database()->prepare("SELECT * FROM `crud` WHERE email=:email");
        $con->bindParam("email",$this->email);
        $con->execute();
        $sign=$con->fetchObject();
      
        if(empty($this->name)||empty($this->email)||empty($this->password)||empty($this->dapartment)){
            echo ' <div class="alert alert-danger container mt-3" role="alert">    يجب ادخال جميع البيانات</div>';
        }
        elseif($sign==null){
            if(strtolower($this->dapartment)!="cs" && strtolower($this->dapartment)!="it"&&strtolower($this->dapartment)!="is"){
                echo ' <div class="alert alert-danger container mt-3" role="alert">      هذا القسم ليس موجود  </div>';
            }else{
                $con=$this->connect_database()->prepare("INSERT INTO `crud`(name,department,email,password)
                VALUES(:name,:department,:email,:password)");
                $con->bindParam("name",$this->name);
                $con->bindParam("department",$this->dapartment);
                $con->bindParam("email",$this->email);
                $con->bindParam("password",$this->password);
             $con->execute();
             session_start();
             
             $_SESSION['name']=$this->name;
             $_SESSION['email']=$this->email;
             $_SESSION['department']=$this->dapartment;
            //  header("Location:http://localhost/crud/data.php");
             echo ' <div class="alert alert-success container mt-3" role="alert">   تمت الاضافة       </div>';
            }
          
        }
        else{
            echo ' <div class="alert alert-danger container mt-3" role="alert">      هذا الحساب موجود من قبل</div>';
          }
         
        
    }
function empty_update(){
  if(isset($_POST['sure2'])){

    if(empty($_POST['username'])||empty($_POST['email'])||empty($_POST['department'])){
        echo ' <div class="alert alert-danger container mt-3" role="alert">    يجب ادخال جميع البيانات</div>';
    }
    else{
        if(strtolower($_POST['department'])!="cs" && strtolower($_POST['department'])!="it"&&strtolower($_POST['department'])!="is"){
            echo ' <div class="alert alert-danger container mt-3" role="alert">      هذا القسم ليس موجود  </div>';
        }else{
            $select_data=$this->connect_database()->prepare("UPDATE `crud` SET name=:name,department=:department WHERE email=:email ");
            $select_data->bindParam("email",$_POST['email']);
            $select_data->bindParam("name",$_POST['username']);
            $select_data->bindParam("department",$_POST['department']);
            $select_data->execute();
            echo ' <div class="alert alert-success container mt-3" role="alert">     Done      </div>';
        }
    }
    
  }

}

    function go_to_update(){
               if(isset($_POST['edit']) && isset($_POST['id'])){
                    $select_data=$this->connect_database()->prepare("SELECT * FROM `crud` WHERE id=:id");
                    $select_data->bindParam("id",$_POST['id']);
                   $select_data->execute();
                   $arr=$select_data->fetch();
                   session_start();
                   header("Location:http://crud.test/update.php");
                    $_SESSION['name']=$arr['name'];
                    $_SESSION['email']=$arr['email'];
                    $_SESSION['department']=$arr['department'];
               }
    }
    function delete(){
        if(isset($_POST['delete']) && isset($_POST['id'])){
            $del=$this->connect_database()->prepare("DELETE FROM `crud` WHERE id=:id");
            $del->bindParam("id",$_POST['id']);
            $del->execute();
       }
    }
    function search(){
        if(isset($_POST['search_input'])){
            $search=$this->connect_database()->prepare("SELECT * FROM `crud` WHERE email LIKE ':email%' ");
            $search->bindParam("email",$_POST['search']);
            $search->execute();
          $arr_search= $search->fetchAll();
        }
    }

}

?>