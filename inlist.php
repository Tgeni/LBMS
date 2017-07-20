 <?php
Include('db.php');
session_start();

if(isset($_POST['insert']))
{
$bookname = $_POST['bookname'];
$writer = $_POST['writer'];
$dept = $_POST['dept'];
$bdate = date('d / m / Y');

if(!empty($bookname) && !empty($writer) && !empty($dept) && !empty($bdate)){
// Perform queries
$query = "INSERT INTO books (bookname, writer, dept, bdate)
VALUES ('$bookname','$writer', '$dept', '$bdate')";


  $result = mysqli_query($con,$query);
    
    // check if mysql query successful

    if($result)
    {
      header('Location: show.php');
    }
    
    else{
        $error = 'Data Not Inserted';
    }
  }else{
        $error = 'Data Not Inserted';
  }
    
    mysqli_free_result($result);
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>New Book Inlist</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Informations Of Library</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
    margin: 20px;
}
<style>
  body {
  background-color: #ffffff;
  width: 100%;
}
fieldset {
  height: 50%;
  width: 80%;
  background: #ffffff;
  margin: auto;
  text-align: center;
}
fieldset input {
  text-align: center;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div style="float:right">
  <p><a href="login.php" class="btn btn-info btn-lg">
    <span class="glyphicon glyphicon-log-out"></span> Log out</a>
</p> 
</div>
</head>
<body>
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class=active"><a href="home.php">Home</a></li>
        <li class="active" ><a href="show.php">Categorized Books</a></li>
        <li class="active" ><a href="inlist.php">New Book Registration</a></li>
        <li class="active" ><a href="lend.php">Borrowers Information</a></li>
    </ul>
</div>
<div class="bg"></div>
  <form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">New Book Registration</legend>
    </div>
    <div class="control-group">
      <label class="control-label"  for="bookname">Book name</label>
      <div class="controls">
        <input type="text" id="bookname" name="bookname" placeholder="" class="input-xlarge">
      </div>
      <br />
    </div>
 
    <div class="control-group">
      <label class="control-label" for="writer">Writer Name</label>
      <div class="controls">
        <input type="text" id="writer" name="writer" placeholder="" class="input-xlarge">
      </div>
      <br />
    </div>
 
    <div class="control-group">
      <label class="control-label" for="dept">Department</label>
      <div class="controls">
        <select name="dept" style="text-align:center" class="selectpicker" data-live-search="true">
        <option>CSE</option>
        <option>EEE</option>
        <option>ECE</option>
        <option>BBA</option>
        <option>Science fiction</option>
        <option>Action and Adventure</option>
        <option>Mystery</option>
        <option>Horror</option>
        <option>Science</option>
        <option>History</option>
        <option>Math</option>
        <option>Anthology</option>
        <option>Novel</option>
        <option>Poetry</option>
        <option>Encyclopedias</option>
        <option>Dictionaries</option>
        <option>Biographies</option>
        <option>Autobiographies</option>
        </select>
    </div>
      <br />
    </div>
    <div style="color:#CC0000"><?php echo $error;?></div>
    <br />
    <div class="control-group">
      <div class="controls">
        <button name="insert" class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
</body>
</html>
