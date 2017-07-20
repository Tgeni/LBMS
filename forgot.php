 <?php
session_start();
Include('db.php');


if(isset($_POST['insert']))
{
$email = $_POST['email'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

// Perform queries

    $query = "INSERT INTO forgot (email)
    VALUES ('$email')";


  $result = mysqli_query($con, $query);
    
    // check if mysql query successful

    if($result)
    {
      header('Location: login.php');
    }
    else{
        $error = 'Email is Not Valid';
    }
  } else {
        $error = 'Email is Not Valid';
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

      <title>Password Forgot</title>
   </head>
   <body>
   
      <div class="container">
         <div class="row main">
            <div class="main-login main-center">
            <h5>Retrieve Your Password</h5>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  
                  <div class="form-group">
                     <label for="email" class="cols-sm-2 control-label">Email</label>
                     <div class="cols-sm-10">
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                           <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                     </div>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                  </div>                     
                  <div class="container" style="background-color:#fffff">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                       <input type="submit" name="insert" value="Send">
                </div>
               </form>
               <br />
               <div class="container" style="background-color:#fffff">
                   <span class="psw"><a href="login.php">Login</a></span>
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