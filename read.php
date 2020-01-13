<?php
session_start();
include("dbprocess.php"); 

$q = "SELECT * FROM testt";

$res = mysqli_query($conn,$q);

if (isset($_SESSION['name'])):
?>
<!DOCTYPE html>
<html>
<head>
	<title>read data</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="read.css">
	<script>
function myFunction() {
  alert("<?php echo " welcome ".$_SESSION['name']." You Are Successfully Loged in"; 

  	?>");
}
</script>
</head>
<body onload="myFunction()">
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Artical Site</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="artical.php"><span class="glyphicon glyphicon-user"></span>Artical</a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="wrapper">
	<div style="height: 5%;	width: 95%;	margin: 1% auto;background-color:green;	font-variant: small-caps;text-align: center;	text-decoration: underline;	font-style: oblique;font-size: 30px ;">
		<?php echo " welcome ".$_SESSION['name'];
		 ?>
		 
			<a href="artical.php" style="margin-left: 5%"><button>POST</button></a>
	</div>
<table class="tbl">
	<tr>
		<th>
			id
		</th>
		<th>
			full name
		</th>
		<th>
			email
		</th>
		<th>
			Password
		</th>
		<th>
			contact
		</th>
		<th>
			city
		</th>
		<th>
			Reg Time
		</th>
		<th>
			Log Time
		</th>
		<th colspan="2">
			Action
		</th>
	</tr>
	
	
<?php
 if($res != null){
 	// 'mysqli_fetch_assoc ( mysqli_result $res )'
     // $row = $res-fetch_assoc();
                        while($row = $res->fetch_assoc()){
                            echo '<tr>';
                                echo "<td> ".$row['id']." </td>";
                                echo "<td> ".$row['fname']." </td>";
                                echo "<td> ".$row['email']." </td>";
                                echo "<td> ".$row['password']." </td>";
                                echo "<td> ".$row['contact']." </td>";
                                echo "<td> ".$row['city']." </td>";
                                echo "<td> ".$row['reg-time']." </td>";
                                echo "<td> ".$row['log_time']." </td>";
                                echo "<td> "."<button>Edit</button>"." </td>";
                                echo "<td> "."<button>Delete</button>"." </td>";
                            echo '</tr>';   
                            }
                       
                    }else{
                            echo 'No result';
                        }
 ?>


</table>	
</div>
</body>
</html>
<?php else:
	header("location:login.php");
 ?>
<?php endif ?>