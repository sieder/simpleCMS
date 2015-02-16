<?php #this is the submit product registration page
$page_title = "Product Registration";
include 'template/header.php';

	//Below is the function that automate a 10 digit random number
	$number = '1253111111'; 
	$Product_ID = rand() + $number;
		
	//generates number from product_ID and adds 2 digit randomly 
	$int = rand(10,99);		
	$Testing_ID = $Product_ID . $int;
	
//isset — function that determine if a variable is set and is not null
if(isset($_POST['submitted'])){ #check if the form has been submitted
	//check for an upload file
	if(isset($_FILES['upload'])){ #to validate the file 
		$allowed = array ('image/pjpeg', #I imposed all image file types into an array called $allowed
		'image/jpeg','image/jpeg',
		'image/JPG','image/X-PNG',
		'image/PNG', 'image/png',
		'image/x-png');
		if(in_array($_FILES['upload']['type'],$allowed)){
			if(move_uploaded_file($_FILES['upload']['tmp_name'],"Uploads/{$_FILES['upload']['name']}")) //moving the file to its permanent 																											place
			{
				
				$image =  "Uploads/{$_FILES['upload']['name']}"; //Im making a $image variable so I can display it later
				echo "<fieldset>The file has been upload!<br>" .  '<img style="border:1px solid gray;" src="' .$image .'" width="50px" height="50px"><br>'  ;					//Finally it works!!! I used <img src and called the $image to display the upload image =) 
				
			}//end of IF move
			
		}else{ //invalid file type else
			echo 'Please upload a valid image file. JPEG or PNG';
		}
	}//End of isset($FILES['upload']) IF 
	if($_FILES['upload']['error'] > 0){ //check for any error =P
		echo 'The file could not be uploaded because';
		
		//Switch that prints detailed error
		switch($_FILES['upload']['error']){
			case 1:
				print 'The file exceeds the upload max';
				break;
			case 2:
				print 'File upload stopped';
				break;
			default:
				print 'A system error occured';
				break;
		}//end of switch : there are several more possible reasons to occur. 
		 //
	}//End of IF error
	//Delete file is exist
	//if file_exists return TRUE unlink will be triggered =P 
	if( file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])){
		//i will use unlink() function to remove the file 
		unlink($_FILES['upload']['temp_name']);
	
	}
}//End of the submitted conditional


if(isset($_POST['submitted'])){
	
	
		


		
		
	$errors = array();
	//i created an array so I could use it later to validate textfields
	require 'includes/mysql_connection.php'; //this is for the function mysql_real_escape_string to refer to....
	//check company name if entered
	if(empty($_POST['ProdID'])){
		
	}else{
		$PID = $_POST['ProdID'];
	}
	
	if(empty($_POST['TestID'])){
		
	}else{
		$TID = $_POST['TestID'];
	}
	
	if(empty($_POST['Company_Name'])){
		$errors[] = 'You forgot to enter the Company\'s name';
	}else{
		$CN = trim(mysql_real_escape_string($_POST['Company_Name']));
	}
	
	//check product_title if entered
	if(empty($_POST['Product_Name'])){
		$errors[] = 'You forgot to enter the product\'s name';
	}else{
		$PN = trim(mysql_real_escape_string($_POST['Product_Name']));
	}
	//testing type
	if(empty($_POST['Testing_Type'])){
		$errors[] = 'Please choose a testing type';
	}else{
		$TT = trim(mysql_real_escape_string($_POST['Testing_Type']));
	}
	
	//check comment
	if(empty($_POST['Product_Comment'])){
		$errors[] = 'Please populate this field';
	}else{
		$PC = trim(mysql_real_escape_string($_POST['Product_Comment']));
	}
	//tester
	if(empty($_POST['Tester'])){
		$errors[] = 'You forgot to choose a tester';
	}else{
		$T = trim(mysql_real_escape_string($_POST['Tester']));
	}
	
	if(empty($errors)){
		//this line means that if everything is ok = execute the following code
		
		//register the infos to the database
		
		require'includes/mysql_connection.php'; //connect to the DB
		//select databaes
		
		//make the query
		$q = "INSERT INTO products(Product_ID, Testing_ID, Company_Name, Product_Name, Testing_Type, Product_Comment, Tester, Date_Entered, Image)
				VALUES('$PID', '$TID', '$CN', '$PN', '$TT', '$PC', '$T',NOW(),'$image')";
		
		$r = @mysql_query($q, $conn); //run the query
		if($r){//if it ran ok
			Echo 'Thank you for sending! We will run tests as soon as possible<br> We\'ll start after a day or two. ';
			echo '<br>Please wait... <meta http-equiv=\'refresh\' content="10;url=index.php"';
			
			echo "Successfuly posted!<br><i>Submitted products are automatically posted <a href=\"products.php\">here</a></i></fieldset>";

		}else{ //if didnt run ok
			echo '<h1>System Error</h1>';
			echo '<p>System Error Occured - '.mysql_error($conn).'<br>Query: '.$q.'</p>'; 
		}//end of if)$r)
		mysql_close($conn);
		
		include'template/footer.htm';
		
		exit();
		
	}else //now report the errors from $error array
	{
		echo '<h1>Error!</h1>';
		echo '<p>The following error(s) occured: <br>';
		foreach ($errors as $msg){//Print
		echo " - $msg<br>\n";
		}
		echo '<p>Please try again!!!</p>';
	} // end of if(empty($errors))
}// end of main conditional
?>
<div class="trans" style= "background-color:#63B8FF; border:0px solid #ddd; width:880px; margin:0 auto">
<form enctype="multipart/form-data" action="submit.php" method="post">
<fieldset>
Product ID:  <input type="text" name="ProdID" value="<?php echo $Product_ID; ?>"><br>
<!-- I called the function random() to generate 10 digit as requested =D   -->
Testing ID:  <input type="text" name="TestID"  value="<?php echo $Testing_ID; ?>">
<br><i>(Copy your productID or Testing ID to track your product)</i> 
<p>Company Name : <input type="text" name="Company_Name" size="15" maxlength="40" value=""></p>
<p>Product Name : <input type="text" name="Product_Name" size="15" maxlength="40" value=""></p>
<p>Testing Type : <input type="text" name="Testing_Type" size="15" maxlength="40" value=""></p>
<TEXTAREA name="Product_Comment" rows="15" cols="30">
	
</TEXTAREA>
<p>Tester Name : <input type="text" name="Tester" size="15" maxlength="40" value=""></p>

</fieldset>
<input type="hidden" name="MAX_FILE_SIZE" value="524288">
<fieldset>Upload an image of the product 
<p>File: <input type="FILE" name=upload></p>
Select a JPEG or PNG image of 512KB or smaller to be uploaded<br>

</fieldset>
<input type="submit" name="submit" value="Submit">
<input type="hidden" name="submitted" value="TRUE">
</form>

</div>

<?php

include'template/footer.htm';
?>