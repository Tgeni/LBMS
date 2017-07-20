<?php
   Include ('db.php');

   $del = $_GET['id'];

   // sql to delete a record
   $sql = "DELETE FROM student WHERE book_id=$del";

   if($con->query($sql) == TRUE){
      header("location: lend.php");    
   }
   mysqli_close($con);
?>

