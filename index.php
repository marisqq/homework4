
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="lib/jquery-3.4.1.min.js" defer></script>
  <script src="lib/bootstrap.min.js" defer></script>
  <!-- <script src="custom.js" defer></script> -->
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="lib/bootstrap.min.css">
  <link rel="stylesheet" href="\css\style.css">
    <title>To do</title>
</head>
<body>
  <div class="navbar d-flex justify-content-center"><h1>To do list</h1></div>
<div class="row d-flex justify-content-center">
  <div class="col-sm-4">
    <div class="card m-5">
      <div class="card-body">
      <h5 class="card-title text-white">Create task</h5>
      <form method="POST" class="form-inline" action="add_query.php">
					<input type="text" class="form-control" name="task">

					<button class="btn btn-outline-dark ml-2" name="add">Add Task</button>
				</form>
      </div>
    </div>
    
  </div>
  

<div class="row">
  <div class="col-sm-14">
    <div class="card m-3 mt-4">
      <div class="card-body">
      <table class="table">
				<tr>
					<th>Nr.</th>
					<th>Task</th>
					<th>Status</th>
					<th>Control</th>
				</tr>
			<tbody>
				<?php require 'conn.php';
$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
$count = 1;
while ($fetch = $query->fetch_array()) {
    ?>
				<tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $fetch['tasks'] ?></td>
					<td><?php echo $fetch['status'] ?></td>
					<td colspan="2">

							<?php
if ($fetch['status'] != "Done") {
        echo '<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success"><span> ✔ </span></a> ';
    }?>
      <!-- <a  class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><span>Edit</span></a> -->
     <a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger"><span>✖</span></a>
					</td>
				</tr>
				<?php
}
?>
			</tbody>
		</table>
      </div>
    </div>
  </div>

</div>
    <!-- Modal for edit -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" class="form-inline" action="edit_query.php">
					<input type="text" class="form-control" required name="task_id">
          <input type="hidden" name="id" value="<?=$id?>"/>
         <button type="submit" name="tasl_id" >add</button>
				</form>
      </div>

    </div>
  </div>
</body>
</html>
