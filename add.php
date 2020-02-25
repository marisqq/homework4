<?php
include_once 'db.php';


if(isset($_POST['send'])){
    $name = $_POST['task'];

    $sql = "insert into tasks (name) values ('$name')";

   $val = $db->query($sql);
   if($val){         //checks if value is inserted
      header('location: index.php');    //Takes back to index (like href)
   }
}