<?php
$page_title = 'Product View';
include'template/header.php';

?>
<?php


?>
<?php

require 'includes/mysql_connection.php';

if(isset($_GET['Product_Name'])){
	$Product_Name = mysql_real_escape_string($_GET['Product_Name']);
	$q = "SELECT Product_Name, image, Company_Name, Details FROM productlist WHERE Product_Name = '$Product_Name' LIMIT 1";
	
	if($result = mysql_query($q)){
		if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			echo '<div class="trans" style="border: 0px solid #ddd; width: 880px; background-color: gray"><table cellpadding="45px" ><tr>';
			echo '<td><img src="'.$row['image'].'"  width="200px" height="200px" border="1px"></td>';
			echo '<td>Company Name:<br><img src="'.$row['Company_Name'].'"  border="1px"> <br>';
			echo "Product:<br><font color=skyblue>{$row['Product_Name']}</font><br>";
			
			
			$notes = "{$row['Details']}";
			$handle = fopen($notes, "r");
			$contents = fread($handle, filesize($notes));
			
			$contents = nl2br($contents);
			
			echo "Comment:<br><font color=blue border=1px>{$contents}</font></td>";
			fclose($handle);
						
			
			echo '</tr></table></div>';
		}
	}
}

?>






<?php

include 'template/footer.htm';
?>