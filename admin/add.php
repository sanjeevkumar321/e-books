<?php
include "db.php";


if(isset($_POST["submit"])){


    $BookCode=$_POST['BookCode'];
$ISBNNumber=$_POST['ISBNNumber'];
$BookName=$_POST['BookName'];
$AuthorName=$_POST['AuthorName'];
$NoOfPages=$_POST['NoOfPages'];

$Branch=$_POST['Branch'];
$EditionRemarks=$_POST['EditionRemarks'];



$allow= array('pdf');
$temp = explode(".", $_FILES['pdf_file']['name']);
$extension = end($temp);
$upload_file=$_FILES['pdf_file']['name'];
move_uploaded_file($_FILES['pdf_file']['tmp_name'],"upload/" . $_FILES['pdf_file']['name']);







    $sql=mysqli_query($conn,"INSERT INTO `books_data`(`id`, `book_code`, `ISBN_number`, `book_name`, `name_of_PDF_file`, `author_name`, `no_of_pages`, `branch`, `edition_remarks`) VALUES ('','$BookCode','$ISBNNumber','$BookName','".$upload_file."','$AuthorName','$NoOfPages','$Branch','$EditionRemarks')");


   

    if($sql){
    	
      
echo '<script language="javascript">
	alert("upload successfully sent");
    window.location="index.php"; 

     </script>';


  

            

            }


    else{
      

           echo '<script language="javascript">';
echo 'alert("Error!!")';
echo '</script>';

      }


    

    

  }



?>
