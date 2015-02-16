<?php
$page_title = 'Product View';
include'template/header.php';

?>



<?php

require 'includes/mysql_connection.php';

if(isset($_GET['Product_Name'])){
	$Product_Name = mysql_real_escape_string($_GET['Product_Name']);
	$q = "SELECT * FROM products WHERE Product_Name = '$Product_Name' LIMIT 1";
	
	if($result = mysql_query($q)){
		if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			echo '<div class="trans" style="border: 0px solid gray; background-color:gray"><table cellpadding="45px" ><tr>';
			echo '<td><img src="'.$row['Image'].'"  width="200px" height="200px"></td>';
			echo "<td>Company Name:<br><font color=skyblue>{$row['Company_Name']}</font> <br>";
			echo "Product:<br><font color=skyblue>{$row['Product_Name']}</font><br>";
			echo "Status:<br><font color=skyblue>{$row['Status']}</font><br>";
			echo "Submitted Date/Time:<br><font color=skyblue>{$row['Date_Entered']}</font><br>";
			echo "Testing Type:<br><font color=skyblue>{$row['Testing_Type']}</font><br>";
			echo "Tester:<br><font color=skyblue>{$row['Tester']}</font><br>";
			
		
			
			$contents = $row['Product_Comment'];
			
			echo "Comment:<br><font color=blue border=1px>{$contents}</font></td>";
		
			
			
			echo '</tr></table></div>';
		}
	}
}

?>



<?php
include 'template/footer.htm';
?>