<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<title> To-Do List Activity </title>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h1 class="text-center"> To-Do List App </h1>

				<form action="../controllers/addTask.php">
					<input class="form-control" id="new-task" type="text" name="name">
					<button id="addTaskBtn" class="btn btn-primary form-control mt-2"> Add Task </button>
				</form>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-6">
				<h2 class="text-center mt-3"> Task List </h2>
				<ul id="taskList">

					<?php

						require_once '../controllers/connection.php';

						$sql = "SELECT * FROM tasks";
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_assoc($result) ) { ?>
							<li data-id="<php echo $row['id'] ; ?>">
					<!-- <?php echo $row['name'] . " is task number " . $row['id'] ; ?> -->
								<?php echo $row['name'] ; ?>
								<button class="deleteBtn form-control btn-secondary mb-3"> Delete </button>
					
							</li>

					<?php } ?>

				</ul>

		<!-- Delete Task -->	

				<script>
					// delete task
					$('#taskList').on('click', '.deleteBtn', function() {
						// alert();
						const task_id = $(this).parent().attr('data-id');
						//console.log(task_id);

						$.ajax({
							method : 'post',
							url : '../controllers/removeTask.php',
							data : { task_id : task_id }
						}).done( data => {
							$(this).parent().fadeOut();
						});
					});
				</script>



			</div>
		</div>

		<div class="row justify-content-center mt-5">
			<div class="col-md-6">

				<span class="form-control p-5 justify-content-center">
					<button class="doneBtn btn-success"> Done </button>
					<button class="removeBtn btn-danger"> Remove </button>
				</span>
				<h3 class="text-center mt-3"> Done Task </h3>
			</div>
		</div>

		<!-- Done task -->

		<script>
		
			$("#addTaskBtn").click( () => {
				const newTask = $('#new-task').val();

				$.ajax({
					method : 'GET',
					url : '../controllers/add_task.php',
					data : {name : newTask},
				}).done(
					console.log('added task')
				);
			});

		</script>

	</div>

</body>
</html>