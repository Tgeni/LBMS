<?php
   Include('db.php');
   session_start();

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($con, $_POST['email']);
      $mypassword = mysqli_real_escape_string($con, $_POST['password']); 
      
      $sql = "SELECT id FROM signin WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         header('Location: home.php');
      }else {
         $error = "Your Login Email or Password is invalid";
      }
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
            <h5>Log in for Library Administrative</h5>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  
                  <div class="form-group">
                     <label for="username" class="cols-sm-2 control-label">Email Address</label>
                     <div class="cols-sm-10">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
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
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                  </div>


                  <div class="form-group ">
                     <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                       <input type="submit" value="Login">
                    </div>
               </form>
               <div class="container" style="background-color:#fffff">
                          <span class="psw"><a href="forgot.php">Forgot password?</a></span>
                      </div>
                      <div class="container" style="background-color:#fffff">
                          <span class="psw"><a href="signin.php">Signup</a></span>
                      </div>
            </div>
         </div>
      </div>

       <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   </body>
</html>