<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<body>

<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "tutorial";

$con = mysqli_connect($hostname, $username, $password, $databaseName);
	
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$password = $_POST["pword"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["dd"]."-".$_POST["mm"]."-".$_POST["yyyy"];


$query = "insert into register(fname,lname,username,password,email,phone,birthdate)
values('$fname','$lname','$uname','$password','$email','$phone','$date')";

$result=mysqli_query($con,$query );

if($result){
?>
<div id="regForm"><span class="success"></span><h1>Registration Success</h1></div>

<?php
}
else{
?>

<div class="regForm"><h1>Oops!! Something went wrong.</h1></div>
<?php
}
	
?>

<style>
	* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 50%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}
.success {

      height: 25px;
      width: 12px;
      margin-left: 50%; 
	  display: inline-block;
      transform: rotate(45deg);
      border-bottom: 7px solid #78b13f;
      border-right: 7px solid #78b13f;
    }
 

</style>

 


</body>
</html>