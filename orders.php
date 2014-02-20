<!DOCTYPE html>

<?php   
require "includes/config.php";  
?>




<?php
if(isset($_POST['delete_orders'])) {
		  $delete_id = mysql_real_escape_string($_POST['delete_orders']);
		  mysql_query("DELETE FROM orders WHERE `Order_ID`=".$delete_id);
		  header('Location: orders.php');
		}
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders - Droid4sale</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div>

      <!-- Sidebar -->
		<?php
		//navigation
		include_once('includes/navbar.php');
		?>

      <div class="page-header">
		
		
		<div class="well" class="page-header">
          <div class="col-lg-12">
		  <h1>Orders <small>Droid4sale</small></h1>
			<form action="orders.php" method="post">
			<input type="hidden" name="task" value="Orders" />
			  <fieldset>
			   <center>
				Start Date: <input type="date" id="startdate"  value="2011-12-05" name="start_date"> TO
				End Date: <input type="date" id="enddate"  value="2013-12-05" name="end_date">
				By Year: 
				<?php
					echo '<select name="year">
						<option value="">-Year-</option>';
					$value=$_POST ["year"];
					$fetch = mysql_query("SELECT DISTINCT YEAR(Order_Date) FROM orders GROUP BY Order_Date");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>


				
				Sort By: 
				<select name="sort_by">
					<option value="Order_ID">ID</option>
					<option value="Order_Date">Order Date</option>
					<option value="Price">Order Price</option>
				</select>
				
				<input type="radio" name="sort_type" checked="checked" value="ASC">Asc
				<input type="radio" name="sort_type" value="DESC">Desc
				
				<input class="btn btn-primary btn-xs" type="submit" value="Submit"/>  </center>  
				  </fieldset>
			</form>
			
			

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
	</div>

	
<?php
if(isset($_POST['task']))
{
$year = ($_POST['year']);
$sDate = ($_POST['start_date']);
$eDate = ($_POST['end_date']);
$Sort = ($_POST['sort_by']);
$Sort_Type = ($_POST['sort_type']);

	$query="SELECT * FROM orders WHERE (YEAR(Order_Date) LIKE '%$year%') AND Order_Date >= STR_TO_DATE('$sDate' , '%Y-%m-%d') AND Order_Date <= STR_TO_DATE('$eDate', '%Y-%m-%d') ORDER BY $Sort $Sort_Type";
    $result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 

		if (mysql_num_rows($result) > 0) { 

			while($row = mysql_fetch_row($result)) { 
				$OrderID = $row[0];
				$IMEI = $row[1];
				$OrderDate = $row[2];
				$Track_num = $row[3];
				$Price = $row[4];
				$wID = $row[5];
				$cID = $row[6];
				
				
				echo '
					<ul class="col-md-3 ">
                            <div class="thumbnail">
                                <div class="span3">
                                <center><img
                                     src="img/box.png"
                                     alt="Box Pic">
								</div></center>
								<br/>
								<div class="span6">		
								<center>
								<table class="table">
								<tr><td><h5><b>Order ID: </b></h5></td><td>'.$OrderID.'</td></tr>
								<tr><td><h5><b>IMEI #: </b></h5></td><td>'.$IMEI.'</td></tr>
								<tr><td><h5><b>Order Date: </b></h5></td><td>'.$OrderDate.'</td></tr>
								<tr><td><h5><b>Tracking Number: </b></h5></td><td>'.$Track_num.'</td></tr>
								<tr><td><h5><b>Total Price: </b></h5></td><td>$'.$Price.'</td></tr>
								
								</table>
								</center>
								</div>
								
								<center>
								<form action="orders.php" method="post">
									<input type="hidden" name="delete_smartphone" value='.$OrderID.' />
									<input type="submit" class="btn btn-primary" value="Delete" />
								</form>
								</center>
								
						   </div>
                    </ul>';
				

			} 

 
		} 
		else { 
			echo "No Smartphones found!"; 
		} 

}

?>

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>