<?php
include "db.php";
if(isset($_POST['deleteid']))
{
      $user_id = $_POST['deleteid'];

  
     $sql = "SELECT  `name_of_PDF_file` FROM `books_data` WHERE id = ' $user_id'";

    $result_d = mysqli_query($conn, $sql);
    mysqli_num_rows($result_d);
	$row = mysqli_fetch_array($result_d);
   
    //echo $row['name_of_PDF_file'];
      unlink("upload/".$row['name_of_PDF_file']);
   

	$deletequery = " DELETE FROM `books_data` WHERE id ='$user_id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {


        exit(mysqli_error());



}






	



}


?>