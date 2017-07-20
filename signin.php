 <?php
Include('db.php');
session_start();

if(isset($_POST['insert']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password1 = $_POST['confirm'];

if(!empty($name) && !empty($email) && !empty($password) && !empty($password1)){
	$query = "INSERT INTO signin (name, email, password)
	VALUES ('$name','$email', '$password')";


	$result = mysqli_query($con, $query);
    
    // check if mysql query successful

    if($result)
    {
    	header('Location: login.php');
    }
    
    else{
		$errorM = 'Data Not Inserted';
    }

}else if($password != $password1){
	$error = "Sorry pasword did not match!!";
}else{
	$errorM = 'Data Not Inserted';
   }
    mysqli_free_result($result);
    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Library Admin</title>
	</head>
	<body>
	
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5>Sign up once for Library Administrative</h5>
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>

						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $errorM; ?></div>
						<br />
						</div>

						<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
						<br />
						<div class="form-group ">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="	true"></i></span>
							  <input type="submit" name="insert" value="Submit">
						</div>
						<div class="container" style="background-color:#fffff">
                          <span class="psw"><a href="login.php">Login</a></span>
                      </div>
						</div>
					</form>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>