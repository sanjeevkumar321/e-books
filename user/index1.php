
<?php
include "db.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>e-books||admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">
</head>
<body>

<div class="col-md-12">



<h1 class="text-primary text-center">E-books</h1>

          <div class="d-flex justify-content-end">


<input type="text" class="form-control col-sm-2" id="scarch" name="EditionRemarks" placeholder="scarch" >
&nbsp; &nbsp;&nbsp;
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalAddcv"> Add CV
</button>

&nbsp; &nbsp;&nbsp;

        <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Add Book
</button>
          </div>
 

   
    <h2 style="color: #062f4f; font-family: 'Cormorant Unicase', serif;" class="font-weight-bold mb-4"> All Records </h2>
    <div id="records_content">  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       


  <form method="POST" action="add.php" enctype="multipart/form-data">
   <div class="form-group row">
    <label for="BookCode" class="col-sm-4 col-form-label">Book Code</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BookCode" name="BookCode" placeholder="Book Code" required>
    </div>
  </div>

   <div class="form-group row">
    <label for="ISBNNumber" class="col-sm-4 col-form-label">ISBN Number</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="ISBNNumber" name="ISBNNumber" placeholder="ISBN Number" required>
    </div>
  </div>

   <div class="form-group row">
    <label for="BookName" class="col-sm-4 col-form-label">Book Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="BookName" name="BookName" placeholder="Book Name" required>
    </div>
  </div>

   <div class="form-group row">
    <label for="pdf_file" class="col-sm-4 col-form-label">Name of PDF File</label>
    <div class="col-sm-8">
      <input type="file" class="form-control" id="pdf_file"  placeholder="Name of PDF File" name="pdf_file"  accept="application/pdf" / required>
       
    </div>
  </div>

   <div class="form-group row">
    <label for="AuthorName" class="col-sm-4 col-form-label">Author Name</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="AuthorName" name="AuthorName" placeholder="Author Name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="NoOfPages" class="col-sm-4 col-form-label">NoOfPages</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="NoOfPages" name="NoOfPages" placeholder="NoOfPages" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="Branch" class="col-sm-4 col-form-label">Branch</label>
    <div class="col-sm-8">
      <select class="form-control" id="branch" name="Branch" required>
                                         <?php
                                              $res=mysqli_query($conn,"select * from branch ;");
                                              while ($row=mysqli_fetch_array($res)) {
                                         ?>
                                              <option value="<?php echo $row["branch"]; ?>">  <?php echo $row["branch"]; 
                                                                                                ?> 
                                              </option>
                                                 <?php 
                                                      }
                                                        ?>
    </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="EditionRemarks" class="col-sm-4 col-form-label">Edition Remarks</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="EditionRemarks" name="EditionRemarks" placeholder="Edition Remarks" required>
    </div>
  </div>


<input type="submit" name="submit" value="submit">


    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="button" class="btn btn-primary" data-dismiss="modal" onclick="AddBook()">Save changes</button>
        <input type="submit" name="submit">
      </div>
    </div>
  </div>
</div>
</form>


<!--modal2-->
<div class="modal fade" id="ModalAddcv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import CSV file</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



  <form enctype="multipart/form-data" method="post" action="import_csv.php">



<input type="file" name="file" id="file">

    </div>
      <div class="modal-footer">
        <input type="submit" name="submit">
        <button type="button" name="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



  </form>



  
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
