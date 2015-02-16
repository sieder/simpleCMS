
<?php
$page_title = 'Submitted Products List';
include'template/header.php';

?>
<head>

<script src='template/javascripts/box.js' type='text/javascript'></script>
<script type='text/javascript'>

popBoxShowRevertBar = false;
popBoxShowRevertText = false;
popBoxShowRevertImage = false;
</script>
</head>

<?php

require 'includes/mysql_connection.php';

//SQL query
$q = 'SELECT * FROM productlist';
echo '<br><div class="trans" style="border:0px solid #ddd; width:880px; background-color:#63B8FF"><table cellpadding="40px"><tr><td>ID</td><td>Product Name</td><td>Product</td><td>Company</td></tr></table><hr>';
$r = mysql_query($q, $conn); //this is the result 

while($row = mysql_fetch_array($r, MYSQL_ASSOC)){


echo '<table cellpadding="40px"><tr>';
echo '<td >';
echo '<a href="view_products.php?Product_Name='.$row['Product_Name'].'"><font>' .$row['ID'].'</font> </a>';//lists all ID from the DB
echo '</td>';

echo '<td><a href="view_products.php?Product_Name='.$row['Product_Name'].'"><img src="' .$row['image'].'" width="50px" height"50px"id="imgPopBox"onmouseover="PopEx(this,-50,-25,200,98,20,null)"> </a>'; //lists all images 
echo '</td>';	

echo '<td>';
echo '<a href="view_products.php?Product_Name='.$row['Product_Name'].'"><font>' .$row['Product_Name'].'</font> </a>'; //product name
echo '</td>';

echo '<td>';
echo '<a href="view_products.php?Product_Name='.$row['Product_Name'].'"></a><img src="' .$row['Company_Name'].'"width="100px" height"100px"> ';//lists all company name from the DB
echo '</td>';

echo '</tr></table><hr>';
}

mysql_free_result($r);

?>
</div>

<?php
echo '<br>';
include 'template/footer.htm';
?>

