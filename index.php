<?php
	include_once("config.php");
	$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); 
?>
<html>
	<head>	
		<title>Homepage</title>
	</head>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<body>
	<div class="container-fluid">
		<a href="add.html" style="font-size: 18px; margin-left: 10%">Add New Data</a>
		<div>
			<table id="list" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Image</td>
						<td>Name</td>
						<td>Age</td>
						<td>Email</td>
						<td>Update</td>
					</tr>
				</thead>
				<?php
					while($res = mysqli_fetch_array($result)) { 		
						echo "<tr>";
						echo "<td><img src='".$res['image_path']. "' style='width: 30px; height:30px;'></td>";
						echo "<td>" .$res['name']. "</td>";
						echo "<td>" .$res['age']. "</td>";
						echo "<td>" .$res['email']. "</td>";	
						echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fa fa-edit fa-lg'></i></a> <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash-o fa-lg'></i></a></td>";		
					}
				?>
			</table>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#list').DataTable({
				"pageLength": 5,
				"bLengthChange": false,
			});
		});
	</script>
	</body>
</html>
