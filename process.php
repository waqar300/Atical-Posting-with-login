<?php
include("dbprocess.php");



if($_SERVER["REQUEST_METHOD"]=="POST"){
	if (empty($_POST["fname"])) {
		$fnameErr = "Full Name Is Required";
	}
	else{
		if (isset($_POST['fname']) && $_POST['fname'] != "" ) {
		
		$fname = $_POST['fname'];

	}
	}
	

	if (empty($_POST["email"])) {
		$emailErr = "email Is Required";
	}
	else{
		if (isset($_POST['email']) && $_POST['email'] != "" ) {
		$email = $_POST['email'];
	}
	}


	if (empty($_POST["password"])) {
	   $passwordErr = "password is required";
	}
	else{
		if (isset($_POST["password"]) && $_POST["password"] != "") {
			$password =md5( $_POST['password']);
		}
	}


    if (empty($_POST["contact"])) {
    	$contactErr = "contact number is required";
    }
    else{
    	if (isset($_POST["contact"]) && $_POST["contact"] != "") {
    		$contact = $_POST['contact'];
    	}
    }


    if (empty($_POST["city"])) {
    	$cityErr = "city name is required";
    }
    else{
    	if (isset($_POST["city"]) && $_POST["city"] != "") {
    		$city = $_POST['city'];
    	}
    }


}


if (is_null($fnameErr)) {

$q = "INSERT INTO `testt`(`fname`, `email`, `password`, `contact`, `city`) VALUES ('$fname', '$email', '$password', '$contact', '$city')"; 
mysqli_query($conn,$q);
if (isset($q)) {
	header("Location:login.php");
}
else{
	echo "not inserted";
}

}
else{
	
		echo "error";
		echo '<br>';
}

?>