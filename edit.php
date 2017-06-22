<?php
	include_once("config.php");

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		if(isset($_FILES['image']) AND !empty($_FILES['image'])){
			$uploaddir = 'uploads/';
			$uploadfile = $uploaddir .time().'-'. basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
			$result = mysqli_query($mysqli, "UPDATE users SET name = '$name', age = '$age', email = '$email', image_path = '$uploadfile' WHERE id= '$id'");
		}else {
			$result = mysqli_query($mysqli, "UPDATE users SET name = '$name', age = '$age', email='$email' WHERE id= '$id'");
		}	
		header("Location: index.php");
	}
?>
<?php
	$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
	while($res = mysqli_fetch_array($result))
	{
		$name = $res['name'];
		$age = $res['age'];
		$email = $res['email'];
		$image = $res['image_path'];
	}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body class="container" style="background-color: #FDFCDC">
		<div style="margin-left: 200px;"><a href="index.php" style="font-size: 25px;">Home</a></div>
		<div class="box">
			<h3 style="text-align: center;">Update User</h3>
			<div class="div-nest">
			<form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
				<div class="input-w div-marg" >
				    <label class="inputlabel lab-marg">Name</label>
				    <input type="text" name="name" value="<?php echo $name;?>" required>
				    <input type="hidden" name="id" value="<?php echo $id;?>">
				</div>
				<div class="input-w div-marg" >
				    <label class="inputlabel lab-marg">Age</label>
				    <input type="number" name="age" value="<?php echo $age;?>" required>
				</div>
				<div class="input-w div-marg" >
				    <label class="inputlabel lab-marg">Email</label>
				    <input type="text" name="email" value="<?php echo $email;?>" required>
				</div>
				<div class="input-w div-marg">
				    <label class="inputlabel lab-marg">Photo</label>
				    <input type="file" name="image">
				    <a href="<?php echo $image;?>" target="_blank" style="margin-left: 45%;">Photo</a>
				</div>
				<div class="input-w div-marg">
					<input type="submit" name="update" value="Update" style="margin-left: 205px;">
				</div>
			</form>
		</div>	
	</body>
</html>
