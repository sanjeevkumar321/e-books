

<?php

include 'db.php';

if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
                $item1 = mysqli_real_escape_string($conn, $data[0]);  
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                 $item3 = mysqli_real_escape_string($conn, $data[2]);
                  $item4 = mysqli_real_escape_string($conn, $data[3]);
                   $item5 = mysqli_real_escape_string($conn, $data[4]);
                    $item6 = mysqli_real_escape_string($conn, $data[5]);
                     $item7 = mysqli_real_escape_string($conn, $data[6]);
                      $item8 = mysqli_real_escape_string($conn, $data[7]);
                       $item9 = mysqli_real_escape_string($conn, $data[8]);
                       
                $query = "INSERT INTO `books_data`(`id`, `book_code`, `ISBN_number`, `book_name`, `name_of_PDF_file`, `author_name`, `no_of_pages`, `branch`, `edition_remarks`) VALUES('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9')";
                mysqli_query($conn, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
   header("location: index.php");
  }
 }
else
  {
    echo "<script>alert('SELECT A CSV FILE');</script>";
   
   header("location: index.php"); 
  }

}

else
{

  header("location: index.php");  
}
?>