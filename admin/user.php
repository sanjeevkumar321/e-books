
<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">
</head>
<body>

    <h1 class="text-primary text-center">E-books</h1>
  <div class="container">

        <div class="d-flex justify-content-end">


				<input type="text" class="form-control col-sm-2" id="scarch" name="EditionRemarks" placeholder="scarch" >
				&nbsp; &nbsp;&nbsp;
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAddcv"> Add CV
				</button>

				&nbsp; &nbsp;&nbsp;

     
          </div>


          <h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
    



    		<div id="records_content">  </div>









  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
  


$(document).ready(function () {
    readRecords(); 
  });

//////////////////Display Records
  function readRecords(){
    
        var readrecord="readrecord";

    $.ajax({

      url: 'fetch.php',
      type: 'POST',
      data: {readrecord:readrecord},

      success:function(data, status){
      
       //alert(data);    
       $('#records_content').html(data);  
      },

    });


  }

/////////////////////////// Delete
/////////////delete userdetails ////////////
function DeleteUser(deleteid){

  var conf = confirm("are u sure");
  if(conf == true) {
  $.ajax({
    url:"deleterec.php",
    type:'POST',
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}


/*
function AddBook(){

var BookCode= $('#BookCode').val();
var ISBNNumber= $('#ISBNNumber').val();
var BookName= $('#BookName').val();
var Name_of_PDF_File= $('#Name_of_PDF_File').val();
var AuthorName= $('#AuthorName').val();
var NoOfPages= $('#NoOfPages').val();
var Branch= $('#Branch').val();
var EditionRemarks= $('#EditionRemarks').val();

//alert(BookCode+ISBNNumber+BookName+Name_of_PDF_File+AuthorName+NoOfPages+Branch+EditionRemarks);





$.ajax({

      url:"addbook.php",
      type:'POST',
      data: {
        
                 BookCode : BookCode,
                 ISBNNumber : ISBNNumber,
                 BookName : BookName,
                 Name_of_PDF_File : Name_of_PDF_File,
                 AuthorName : AuthorName,
                 NoOfPages : NoOfPages,
                 Branch : Branch,
                 EditionRemarks : EditionRemarks,
      },
      success:function(data, status){
        location.reload(true);

         readRecords();
      },

    });

  }


*/ 

</script>

</body>


</html>