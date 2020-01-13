<?php 
session_start();
include("dbprocess.php");
$id = 0;
$title = "";
$artical = "Write Your Post....";	
$update = false;
if (isset($_POST['submit'])) {
	  // if (isset($_FILES['image']['tmp_name'])){
   //  $file = $_FILES['image']['tmp_name'];
   //  $filename = $_FILES['image']['name'];
   //  $folder="uploads/";
   //  move_uploaded_file($file,$folder.$filename);
   //  $upload = $folder.$filename ;
   //  }

	$photo = $_FILES['image']['name'];
	$upload = "uploads/".$photo;
	print_r($upload);


	if ($_POST['title'] !== null) {
		$title = $_POST['title'];
	}
	if ($_POST['artical'] !== null) {
		$artical = $_POST['artical'];
	}
	if (isset($_SESSION['name'])) {
		$name = $_SESSION['name'];
	}else {
		$name = "Unknown User";
	}
	
	$q = "INSERT INTO `artical`(`fname`, `title`, `post`,`image`) VALUES (?,?,?,?)";
	$stmt=$conn->prepare($q);
	$stmt->bind_param("ssss",$name,$title,$artical,$upload);
	$stmt->execute();
	move_uploaded_file($_FILES['image']['tmp_name'], $upload);

	// mysqli_query($conn,$q);
	// header("location:artical.php");
}
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$q = "SELECT * FROM artical WHERE id=$id";
	$result = mysqli_query($conn,$q);
	$row = $result->fetch_assoc();
	$id = $row['id'];
	$title = $row['title'];
	$artical = $row['post'];
}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$artical = $_POST['artical'];
	$q = "UPDATE artical SET title='$title', post='$artical' WHERE id=$id";
	mysqli_query($conn,$q);
	header("location:artical.php");

}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$q = "DELETE FROM artical WHERE id=$id";
	mysqli_query($conn,$q);
	header("location:artical.php");
	
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Artical</title>
	<style>
.flex-container {
  display: flex;
  flex-wrap: nowrap;
  background-color: DodgerBlue;
  justify-content: center;
}

.flex-container>div {
  background-color:DodgerBlue;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 55px;
  font-size: 20px;
}
.jumbotron { 
  padding: 30px; /* fills out the jumbotron */
  background-color: #f5f5f5;
}

.container {
  width: 1170px; /* specify a width */
  margin: 0 auto;  /* centers the container */
  padding: 0 15px; /* adds some padding to the left and right*/
}
 .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }
.form-control {
  height: auto;
}
.form-group {
  margin-bottom: 1rem;
}
button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}
input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
form{
	margin: 5px;
}
input{
	border-radius: 50px;
  overflow: visible;
}

button{
  text-transform: none;
  border-radius: 50px;
}

	</style>
</head>
<body>
	<div class="jumbotron">
		<div class="flex-container">
  <?php if (isset($_SESSION['name'])): ?>
      <div><?php echo $_SESSION['name']; ?></div>
      <div></div>
      <?php else: ?>
      	<div>Artical Site</div>
      	<div></div>
      <?php endif ?>
  <div></div>
  <div></div>
  <div></div>
  <div></div>  
  <div><a href="login.php"><span class="glyphicon glyphicon-user"></span>login</a></div>
  <div><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></div>  
</div>


<div class="container">
    <form method="POST" action="">
    	<div class="form-group">
    		<input type="hidden" name="id" value="<?php echo $id; ?>">
    		<input type="file" name="image"><br>
    	<input type="text" name="title" class="form-control" required placeholder="Artical Title" value="<?php echo $title; ?>">
    	</div>
    	<div class="form-group">
    	<textarea  class="form-control" rows="12" cols="23" id="artical" name="artical" value="<?php echo $artical; ?>"><?php echo $artical; ?></textarea>
    </div>
    <?php if ($update == true): ?>
    	<input type="submit" class="btn btn-primary" name="update" value="update">
    	<?php else: ?>
    <input type="submit" class="btn btn-primary" name="submit" value="submit">
<?php endif ?>
    </form>
    </div>

	</div>

</body>
</html>