<?php
include 'db.php';
$id = $_GET['id'];

echo $id;
  $sql = "delete from tasks where id = '$id'";

 $val = $db->query($sql);
if($val){
    header('location: index.php');
}

 echo "done";

?>