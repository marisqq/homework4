<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="lib/jquery-3.4.1.min.js" defer></script>
  <script src="lib/bootstrap.min.js" defer></script>
  <!-- <script src="custom.js" defer></script> -->
  <link rel="stylesheet" href="lib/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <title>To do</title>
</head>
<body>
<div class="row d-flex justify-content-center">
  <div class="col-sm-4">
    <div class="card m-5 bg-success">
      <div class="card-body">
      <h5 class="card-title text-white">Create task</h5>
      <form method="POST" class="form-inline" action="add_query.php">
					<input type="text" class="form-control" name="task">

					<button class="btn btn-primary buttn ml-2" name="add">Add Task</button>
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
					<th>#</th>
					<th>Task</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			<tbody>
				<?php
require 'conn.php';
$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
$count = 1;
while ($fetch = $query->fetch_array()) {
    ?>
				<tr>
					<td><?php echo $count++ ?></td>
					<td><?php echo $fetch['task'] ?></td>
					<td><?php echo $fetch['status'] ?></td>
					<td colspan="2">

							<?php
if ($fetch['status'] != "Done") {
        echo '<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success"><span> ✔ </span></a> ';
    }?>
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


</body>
</html>
