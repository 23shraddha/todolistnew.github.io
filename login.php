<?php
session_start();

    // connect to the database
    $db = mysqli_connect("localhost","root","","tas_db");

    if(!$db){
        die("connection error...".mysqli_connect_error());
    }else{
        // echo "You are successfully connected.";
    }
// session_start();
// after form submitted insert values in to tables.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($db,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($db,$password);
	//Checking for user already exist in the table or not
        $query = "SELECT * FROM `registration` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($db,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username OR Password is incorrect.</h3>
<br/><a href='login.php'>Login</a></div>";
	}
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
</head>
<body>

<div class="container">
<h1>Log In</h1>
<form action="" class="form-signin" method="post" name="login" style="width:50%">
<input type="text" name="username" class="form-control" placeholder="User Name" required>
<br>
<input type="password" name="password" class="form-control" placeholder="Password" required>
<br>
<input name="submit" type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</body>
</html>