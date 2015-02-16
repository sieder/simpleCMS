<?php
$page_title = "Home | Welcome";
include 'template/header.php';
?>
<body >
<div class="trans" style="border:0px solid; width: 880px; background-color: #63B8FF; height:600px "><br>
<div class="box" style="margin-left:15px; width:100px; background-color:#F5F5F5; border: 1px solid #ddd"  >
<div class="box" style="width:100px; background-color:red; margin-bottom:10px; padding-top:20px" align=center >
<font  color=white>Products</font>
</div>

<?php 
include 'includes/mysql_connection.php';
$query = 'SELECT image, Product_Name FROM productlist LIMIT 4';
$result = mysql_query($query, $conn);

while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	echo '<img src="'.$row['image'].'" width="100px" style="margin-bottom:5px;">';
	echo '<center><font size=1>'.$row['Product_Name'].'</font></center>';
	
}
?>

</div>
<div class="box" style=" border:1px solid #ddd; background-color: #F5F5F5;  margin-left:20px; width: 620px">
<div class="box" style="background-color:red; width:610px; padding-top:3px; padding-bottom: 2px; margin-bottom: 15px; padding-left: 10px">
<font color="white" face="Chiller" size=8px ><b>Welcome</b></font></div>
<p style="padding:10px 10px 10px 10px" onmouseout="this.style.color = 'black';" onmouseover="this.style.color = '#008B00';">

The SRS Electrical appliances are the manufacturers of some electrical products like switch gears, fuses, capacitors, resistors, etc…. These products after manufactured they are sent for testing where the product is subjected to some testing conditions, and then after the testing is successful at their laboratories they are sent to CPRI for further testing process, so that they can get it approved from CPRI and then release the product into the market. If the testing fails then the product is sent back for re-manufacturing it and then they are again subjected to tests.
</p></div>
<br>
</div>

<?php

include 'template/footer.htm';

?>








