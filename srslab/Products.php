<?php
$page_title = 'Product List';
include'template/header.php';

?>
<head>

<script src='template/javascripts/box.js' type='text/javascript'></script>
<script type='text/javascript'>

popBoxShowRevertBar = false;
popBoxShowRevertText = false;
popBoxShowRevertImage = false;
</script>


<?php


require 'includes/mysql_connection.php';



//SQL query
$q = 'SELECT * FROM products';

$r = mysql_query($q, $conn); //this is the result 
echo '<br><div class="trans" style="border:0px solid #ddd; width:880px;background-color:#63B8FF"><table cellpadding="40px" ><tr>';
echo '<td>ID</td><td>Picture</td><td style="padding-left:80px">Company Name</td><td>Product Name</td></tr></table><hr>';
while($row = mysql_fetch_array($r, MYSQL_ASSOC)){ //while for the loop


	
echo '<table cellpadding="40px" ><tr>';

echo "<td>";
echo '<a href="product_page.php?Product_Name='.$row['Product_Name'].'"><font>' .$row['ID'].'</font> </a>';//lists all ID from the DB
echo '</td>';

echo '<td ><a href="product_page.php?Product_Name='.$row['Product_Name'].'"><img src="' .$row['Image'].'" width="50px" height"50px"id="imgPopBox"onmouseover="PopEx(this,-50,-25,200,98,20,null)"> </a>'; //lists all images 
echo '</td>';	

echo '<td style="padding-left:100px">';
echo '<a href="product_page.php?Product_Name='.$row['Product_Name'].'"><font>' .$row['Company_Name'].'</font> </a>'; //product name
echo '<td>';

echo '<td>';
echo '<a href="product_page.php?Product_Name='.$row['Product_Name'].'"><font>' .$row['Product_Name'].'</font> </a>'; //product name
echo '<td></tr></table><hr>';



}

mysql_free_result($r);
?>
</div>
<br>
<?php

include 'template/footer.htm';
?>
