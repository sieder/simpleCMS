<?php
include'includes/mysql_connection.php';

// Set up our error check and result check array

	

?>
<div id="container" >
<ul id='nav' align="left" >
  <li ><a href='index.php' style="text-decoration:none;">Home</a></li>
  <li ><a style="text-decoration:none;">Products</a>
   
	<ul>
      <li><a href='ManufacturedProducts.php'>Product list</a></li>
      
	
      <li><a href='products.php'>List of submitted products</a> </li>
        
     
     
    </ul>
    
  </li>
  
  <li><a style="text-decoration:none;">Search</a>
  	<ul>
		<li>
	
		<a>
		
		<form method="GET" action="searchresult.php" 
			 style="background-color:#5e5e5e">
		<input type="text" name="search" value="" size=13px>		
		<input type="submit" style="background-color:#5e5e5e; color:#ffffff" value="search" name="submit">
		</form></a>
		
		</li>
	
		
		<li><a href="AdvSearch.php">Advanced search</a></li>

		
	</ul> 
	<li ><a href='submit.php' style="text-decoration:none;">Submit A 	Product</a></li>
	<li ><a href='contactUs.php' style="text-decoration:none;">Contact Us</a></li>

</ul>
</div>

<script type='text/javascript'>
  $(function() {
    $('#nav').droppy();
  });
</script>


