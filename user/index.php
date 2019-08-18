
<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>e-books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">
</head>
<body>

    <h1 class="text-primary text-center">E-books</h1>
  <div class="col-md-12">

        <div class="d-flex justify-content-end">



        <select class="form-control col-sm-3" onchange="OnSelectionChange()" id="branch" name="Branch" required>
           <option value='' disabled selected>Select Branch</option>
           <option value='' >All</option>
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

  &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
				<input type="text" class="form-control col-sm-2" oninput="searchBooks()" id="searchbooks" name="searchbooks" placeholder="search Books Name" >
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


  ////////fetch branch-books
 
function OnSelectionChange()
{
var branch= $('#branch').val();

 $.ajax({
                        
      url: 'fetch_branch.php',
      type: 'POST',
      data: {branch:branch},

      success:function(data, status){
      
       //alert(data);    
       $('#records_content').html(data);  
      },

    });



} 



 ////////fetch search-books
 
function searchBooks()
{
var searchbooks= $('#searchbooks').val();

 $.ajax({
                        
      url: 'fetch_search.php',
      type: 'POST',
      data: {searchbooks:searchbooks},

      success:function(data, status){
      
       //alert(data);    
       $('#records_content').html(data);  
      },

    });



}


//////viewpdf




</script>

</body>


</html>