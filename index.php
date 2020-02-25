<!DOCTYPE html>
<?php include_once 'db.php';
$sql  = "select * FROM tasks";
$rows = $db->query($sql);
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
      <h1>Todo list</h1>
    </center>
  
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add task
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form method="post" action="add.php">
          <div class="form-group">
            <label>Task name</label>
            <input type="text" required name="task" class="form-control" class="btn btn-dark">
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
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Task</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <?php while($row = $rows->fetch_assoc()): ?>

        <th> <?php echo $row['id']?> </th>
        <th> <?php echo $row['name']?> </th>
        <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
        <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

</body>

</html>