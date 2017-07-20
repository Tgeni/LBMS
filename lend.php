
<!DOCTYPE html>
<html>
<head>
  <title>Informations Of Library System</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>List Of Borrowers</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
    margin: 20px;
}
<style>
table, th, td {
    border: 2px solid black;
}
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
        <li class="active"><a href="home.php">Home</a></li>
        <li class="active" ><a href="show.php">Categorized Books</a></li>
        <li class="active" ><a href="inlist.php">New Book Registration</a></li>
        <li class="active" ><a href="lend.php">Borrowers Information</a></li>
    </ul>
</div>
<br> <br />
</body>
</html>


<?php
require ('db.php');

$department = array("CSE", "EEE", "ECE", "BBA", "Science fiction", "Action and Adventure",
  "Mystery", "Horror", "Science", "History", "Math", "Anthology", "Novel", "Poetry",
  "Encyclopedias", "Dictionaries", "Biographies", "Autobiographies");

 foreach ($department as $i) {

$sql = "SELECT c.*, p.* FROM books c, student p WHERE c.book_id = p.book_id AND sdept='$i' ORDER BY roll";

$result = mysqli_query($con, $sql)or die(mysqli_error());

$numr = mysqli_num_rows($result);

  if($numr > 0){
    echo "<table align='center' border = 1>";
    echo "<caption style='text-align:center'><b>Category of ".$i."</b></caption>";
    echo "<tr><th style='text-align:center' width='5%'>Class Roll</th><th style='text-align:center' width='5%'>Borrower Name</th><th style='text-align:center' width='5%'>Department</th><th style='text-align:center' width='5%'>Bookname</th><th style='text-align:center' width='5%'>Writer</th><th style='text-align:center' width='5%'>Borrowed Date</th><th style='text-align:center' width='5%'>Bepaid Date</th><th style='text-align:center' width='5%'>Bepaid Remove</th></tr>";

    while($row = mysqli_fetch_array($result)) {
      $roll = $row['roll'];
      $name = $row['name'];
      $sdept = $row['sdept'];
      $bookname = $row['bookname'];
      $writer = $row['writer'];
      $sbdate = $row['sbdate'];
      $rdate = $row['rdate'];
      $pdate = $rdate;

      echo "<tr>";
      echo "<td align='center'>".$roll."</td>";
      echo "<td align='center'>".$name."</td>";
      echo "<td align='center'>".$sdept."</td>";
      echo "<td align='center'>".$bookname."</td>";
      echo "<td align='center'>".$writer."</td>";
      echo "<td align='center'><font color='blue'>".$sbdate."</font></td>";
      if($pdate > $rdate){
        echo "<td align='center'><font color='red'>".$rdate."</font></td>";
        echo "<td align='center'><a href='delete.php?id=".$row['book_id']."'><font color='red'>Delete</font></a></td>"; }else if($pdate <= $rdate){
        echo "<td align='center'><font color='green'>".$rdate."</font></td>";
        echo "<td align='center'><a href='delete1.php?id=".$row['book_id']."'><font color='green'>Delete</font></a></td>";
    }
  }
   echo "</table><br><br><br />";
   mysqli_free_result($result);
  }else{
    echo "<p style='text-align:center'>No Borrowers Found!!!</p>";
    break;
  } 
}
mysqli_close($con);

?>
