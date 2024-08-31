<?php

class database{
  function connect_database(){
    $username="root";
    $password="";
    $db=new PDO("mysql:host=localhost;dbname=files;charest=utf8",$username,$password);
    return $db;
}
  
}


?>