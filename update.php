<!DOCTYPE html>
<?php include_once 'db.php';

$id = $_GET['id'];

$sql  = "SELECT * FROM tasks WHERE id='$id'";
$rows = $db->query($sql);

$row = $rows->fetch_assoc();
if(isset($_POST['send'])){
    
    $task = $_POST['task'];
    $sql2 = "update task set name = '$task' where id = '$id'";
    $db->query($sql2);
    
    header('location: index.php');


}



?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee v.4.0.</title>
  <script src="lib/jquery-3.4.1.min.js" defer></script>
  <script src="lib/bootstrap.min.js" defer></script>
  <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>

<body>
  <div class="container">

    <center>
      <h1>Update Todo list</h1>
    </center>
       
        <form method="post" action="add.php">
          <div class="form-group">
            <label>Task name</label>
            <input type="text" required name="task" value="<?php echo $row['name'];?>" class="form-control" class="btn btn-dark">
          </div>
          <input type="submit" name="send" value="+">
        </form>
      </div>
      
      <div class="modal-footer">
     
      </div>
    </div>
  </div>
</div>
  </div>
  <hr>
 
</body>

</html>