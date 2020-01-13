<?php 

session_start();
include("dbprocess.php");

$q = "SELECT * FROM artical";
$result = mysqli_query($conn,$q);
// $row = $result->fetch_assoc();

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Artical</title>
 <style>

img {
  border-radius: 5px 5px 0 0;
}
.flex-container {
  display: flex;
  align-items: stretch;
  background-color: #f5f5f5;
}

.flex-container > div {
  background-color: none;
  color: black;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
.container {
  width: 1170px; /* specify a width */
  margin: 0 auto;  /* centers the container */
  padding: 0 15px; /* adds some padding to the left and right*/
}
.jumbotron { 
  padding: 30px; /* fills out the jumbotron */
  background-color: #f5f5f5;
}
button {
  border-radius: 10px;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

button{
  text-transform: none;
  border-radius: 20px;
}


</style>
 </head>
 <body>
 	<div class="jumbotron">
 		<div class="flex-container" style="background-color: DodgerBlue;">
  <?php if (isset($_SESSION['name'])): ?>
      <div><?php echo $_SESSION['name']; ?></div>
      <div></div>
      <?php else: ?>
      	<div>Artical Site</div>
      	<div></div>
      <?php endif ?>
  <div><a href="post.php"><button type="submit" name="" class="btn btn-primary">POST</button></a></div>
  <div style="flex-grow: 4"></div>
  <div><a href="login.php"><button>login</button></a></div>
  <div><a href="logout.php?logout"><button>Logout</button></a></div>  
</div>
</div>
<?php while($row = $result->fetch_assoc()){ ?>

	<div class="flex-container">
  <div style="flex-grow: 4">
  	<img src="<?php echo $row['image']; ?>" alt="Avatar" style="width:20%"><br>
  	<h4><strong><?php echo $row['fname']; ?></strong> - <b class="badge badge-primary"><?php echo $row['title']; ?></b></h4>
  	<p><?php echo $row['post']; ?></p>
  	<a href="post.php?edit=<?php echo $row['id']; ?>"><button>Edit</button></a>
 <a href="post.php?delete=<?php echo $row['id']; ?>"><button>delete</button></a>
  </div>
</div>

  <?php } ?>
 </body>
 </html>