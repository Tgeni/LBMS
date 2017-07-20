<?php
   Include ('db.php');

   $del = $_GET['id'];

   // sql to delete a record
   $sql = "DELETE FROM books WHERE book_id=$del";

   if($con->query($sql) == TRUE){
      header("location: show.php");    
   }
   mysqli_close($con);
?>

