<?php
$page_title = 'Product List';
include'template/header.php';

?>

<?php
include'includes/mysql_connection.php';

// Set up our error check and result check array
$error = array();
$results = array();

// First check if a form was submitted. 
// Since this is a search we will use $_GET
if (isset($_GET['search'])) {
   $searchTerms = trim($_GET['search']);
   $searchTerms = strip_tags($searchTerms); // remove any html/javascript.
   
   if (strlen($searchTerms) < 3) { //condional for validating more than 3 search
      $error[] = "Search terms must be longer than 3 characters.";
   }else {
      $searchTermDB = mysql_real_escape_string($searchTerms); // prevent sql injection.
   }
   
   // If there are no errors, lets get the search going.
   if (count($error) < 1) {
      $searchSQL = "SELECT Product_Name, Testing_ID, Product_ID, Company_Name, Tester FROM products WHERE ";
      
      // grab the search types.
      $types = array();
      $types[] = isset($_GET['Product_Name'])?"`Product_Name` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['Product_ID'])?"`Product_ID` LIKE '%{$searchTermDB}%'":'';
      $types[] = isset($_GET['Testing_ID'])?"`Testing_ID` LIKE '%{$searchTermDB}%'":'';
      
      $types = array_filter($types, "removeEmpty"); // removes any item that was empty (not checked)
      
      if (count($types) < 1)
         $types[] = "`Product_Name` LIKE '%{$searchTermDB}%'"; // use the body as a default search if none are checked
      
          $andOr = isset($_GET['matchall'])?'AND':'OR';
      $searchSQL .= implode(" {$andOr} ", $types) . " ORDER BY `Product_Name`"; // order by title.

      $searchResult = mysql_query($searchSQL) or die("There was an error.<br/>" . mysql_error() . "<br />SQL Was: {$searchSQL}");
      
      if (mysql_num_rows($searchResult) < 1) {
         $error[] = "The search term provided {$searchTerms} yielded no results.";
      }else {
         $results = array(); // the result array
         $i = 1;
        
         while ($row = mysql_fetch_assoc($searchResult)) {
            $results[] = '<table cellpadding="40px" border="1px">
			<tr><td>ID</td><td>Product Name</td><td>Company Name</td>
			</tr>
			<tr><td>'.$i.'.</td> <td> <a href="product_page.php?Product_Name='.$row['Product_Name'].'">'.$row['Product_Name'].' </a></td><td> '.$row['Company_Name'].'</td></tr></table><br /><br />';
            $i++;
         }
      }
   }
}

function removeEmpty($var) {
   return (!empty($var)); 
}
?>

   <style type="text/css">
      #error {
         color: red;
      }
   </style>
   
      <?php echo (count($error) > 0)?"The following had errors:<br /><span id=\"error\">" . implode("<br />", $error) . "</span><br /><br />":""; ?>
     <div class="trans" style= "background-color:#63B8FF; border:1px solid #ddd; width:878px; margin:0 auto">
      <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>" name="searchForm">
         Search For: <input type="text" name="search" value="<?php echo isset($searchTerms)?$searchTerms:''; ?>" /><br />
         Search By:<br />
         Product Name: <input type="checkbox" name="Product_Name" value="on" <?php echo isset($_GET['Product_Name'])?"checked":''; ?> />  |
         Product ID: <input type="checkbox" name="Product_ID" value="on" <?php echo isset($_GET['Product_ID'])?"checked":''; ?> /> |
         Testing ID: <input type="checkbox" name="Testing_ID" value="on" <?php echo isset($_GET['Testing_ID'])?"checked":''; ?> /> |
                 Match All Selected Fields? <input type="checkbox" name="matchall" value="on" <?php echo isset($_GET['matchall'])?"checked":''; ?><br /><br />
         <input type="submit" name="submit" value="Search!" />
      </form>
     
      <?php echo (count($results) > 0)?"Your search term: {$searchTerms} returned:<br /><br />" . implode("", $results):""; ?>
      </div>
    

<?php

include 'template/footer.htm';
?>
