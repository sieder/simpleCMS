<?php

$page_title = 'Contact Us';
include'template/header.php';

?>
<div class="trans" style="border:0px solid; width: 880px; background-color: #63B8FF; height:600px ">
<div class="box" style=" border:1px solid #ddd; background-color: #F5F5F5;  margin-left:20px; width: 620px">
<div class="box" style="background-color:red; width:610px; padding-top:3px; padding-bottom: 2px; margin-bottom: 15px; padding-left: 10px">
<font color="white" face="Chiller" size=8px ><b>Contact Us</b><img src="Images/phone.png" width=50px height=50px></font></div>
<p style="padding:10px 10px 10px 10px" onmouseout="this.style.color = 'black';" onmouseover="this.style.color = '#008B00';">
<form>

Name:<input type=text name=Name><br>
Company:	 <input type=text name=company><br>
Email: 		<input type=text name=email><br>
Subject: 	<input type=text name=subject><br>
Message: <br><textarea name=description rows=10 cols=50></textarea> <br>
<input type=submit name=submit>
</form>

</p></div>


</div>


<?php 

include'template/footer.htm';
?>