<!DOCTYPE html>

<?php   
require "includes/config.php";  
?>




<?php
if(isset($_POST['delete_warehouse'])) {
		  $delete_id = mysql_real_escape_string($_POST['delete_warehouse']);
		  mysql_query("DELETE FROM warehouse WHERE `Order_ID`=".$delete_id);
		  header('Location: warehouse.php');
		}
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Warehouse - Droid4sale</title>

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
		  <h1>Warehouse <small>Droid4sale</small></h1>
			<form action="warehouse.php" method="post">
			<input type="hidden" name="task1" value="Orders" />
			  <fieldset>
			   <center>
				
				
				Sort By: 
				<select name="sort_by">
					<option value="Num_Employees"># Employees</option>
					<option value="Stock">Items in Stock</option>
				</select>
				
				<input type="radio" name="sort_type" checked="checked" value="ASC">Asc
				<input type="radio" name="sort_type" value="DESC">Desc
				
				<input class="btn btn-primary btn-xs" type="submit" value="Submit"/>  </center>  
				  </fieldset>
			</form>
			
			

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
	
	
	<div class="well" class="page-header">
          <div class="col-lg-12">
		  <h1>Repair Center <small>Droid4sale</small></h1>
			<form action="warehouse.php" method="post">
			<input type="hidden" name="task2" value="Orders" />
			  <fieldset>
			   <center>
				Number of Phones Fixed in   
			
				Start Date: <input type="date" id="startdate" value="2013-01-01" name="start_date"> TO
				End Date: <input type="date" id="enddate" value="2013-12-01" name="end_date">
				
				
				<input class="btn btn-primary btn-xs" type="submit" value="Submit"/>  </center>  
				  </fieldset>
			</form>
			
			

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
	</div>

<?php
if(isset($_POST['task1']))
{
$Sort = ($_POST['sort_by']);
$Sort_Type = ($_POST['sort_type']);

	$query="SELECT 
				* 
			FROM warehouse
			Order by $Sort $Sort_Type;";
	
    $result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 


		if (mysql_num_rows($result) > 0) { 

			while($row = mysql_fetch_row($result)) { 
				$ID = $row[0];
				$Location = $row[1];
				$emp_num = $row[2];
				$Stock = $row[3];
				
				
				
				echo '
					<ul class="col-md-3 ">
                            <div class="thumbnail">
                                <div class="span3">
                                <center><img
                                     src="img/warehouse.png"
                                     alt="Box Pic">
								</div></center>
								<br/>
								<div class="span6">		
								<center>
								<table class="table">
								<tr><td><h5><b>Order ID: </b></h5></td><td>'.$ID.'</td></tr>
								<tr><td><h5><b>IMEI #: </b></h5></td><td>'.$Location.'</td></tr>
								<tr><td><h5><b>IMEI #: </b></h5></td><td>'.$emp_num.'</td></tr>
								<tr><td><h5><b>IMEI #: </b></h5></td><td>'.$Stock.'</td></tr>
								
								
								</table>
								</center>
								</div>
								
								<center>
								<form action="warehouse.php" method="post">
									<input type="hidden" name="delete_smartphone" value='.$ID.' />
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

	
<?php
if(isset($_POST['task2']))
{
$sDate = ($_POST['start_date']);
$eDate = ($_POST['end_date']);

	$query="SELECT SUM( NUM_REPAIRED ) AS repaired_smartphones
			 FROM  repair_center
			 WHERE  Audit_date >= STR_TO_DATE('$sDate' , '%Y-%m-%d') AND Audit_date <= STR_TO_DATE('$eDate', '%Y-%m-%d');";
	
    $result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 


		if (mysql_num_rows($result) > 0) { 

			while($row = mysql_fetch_row($result)) { 
				$total = $row[0];
				
				
				
				echo '
				<center>
					 <!--Panel start-->
					  <div class="col-lg-3">
						<div class="panel panel-warning">
						  <div class="panel-heading">
							<div class="row">
							  <div class="col-xs-6">
								<i class="fa fa-group fa-5x"></i>
							  </div>
							  <div class="col-xs-6 text-right">
							 
								<p class="announcement-heading">'.$total.'</p>
								
								<p class="announcement-text">Total Smartphones Repaired</p>
							  </div>
							</div>
						  </div>
						  <a href="employees.php">
							<div class="panel-footer announcement-bottom">
							  <div class="row">
								<div class="col-xs-6">
								  Employee Details
								</div>
								<div class="col-xs-6 text-right">
								  <i class="fa fa-arrow-circle-right"></i>
								</div>
							  </div>
							</div>
						  </a>
						</div>
					  </div></center>
					  <!--Panel END-->';
				

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