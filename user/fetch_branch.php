<?php

include "db.php";
extract($_POST);

 $branch = $_POST['branch'];
if(isset($_POST['branch'])) {

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white"  align="center">
							<th>No.</th>
							<th>book_code</th>
							<th>ISBN_number</th>
							<th>book_name</th>
							<th>name_of PDF_file</th>
							<th>author_name </th> 
							<th>no_of_pages</th>
							<th>branch</th>
							<th>edition_remarks </th> 

							<th>View</th>
							
						</tr>'; 

$displayquery = "SELECT * FROM `books_data` WHERE branch LIKE '%$branch%' ORDER BY `book_name` ASC
 "; 
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr  align="center">  
				<td>'.$number.'</td>
				<td>'.$row['book_code'].'</td>
				<td>'.$row['ISBN_number'].'</td>
				<td>'.$row['book_name'].'</td>
				<td>'.$row['name_of_PDF_file'].'</td>
				<td>'.$row['author_name'].'</td>
				<td>'.$row['no_of_pages'].'</td>
				<td>'.$row['branch'].'</td>
				<td>'.$row['edition_remarks'].'</td>
				<td>
					 <form method="POST" action="pdfview.php" target="_blank">
					  <input type="text" name="pdf" id="pdf" value="'.$row['name_of_PDF_file']. '" hidden >
					  <a href="pdfview.php" target="_blank" >
					<button  class="btn btn-success">View</button>
					</a>
                     </form>
				</td>
				
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;
        
}



?>