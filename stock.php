<!DOCTYPE html>

<?php   
require "includes/config.php";  
?>




<?php
if(isset($_POST['delete_smartphone'])) {
		  $delete_id = mysql_real_escape_string($_POST['delete_smartphone']);
		  mysql_query("DELETE FROM Smartphone WHERE `Stock_NUM`=".$delete_id);
		  header('Location: stock.php');
		}
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stock - Droid4sale</title>

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
		  <h1>Smartphone <small>Droid4sale</small></h1>
			<form action="stock.php" method="post">
			<input type="hidden" name="task" value="smartphone" />
			  <fieldset>
			   <center>
				
				Smartphone Type: 
				<?php
					echo '<select name="sType">
						<option value="">-Smartphone Type-</option>';
					$value=$_POST ["sType"];
					$fetch = mysql_query("SELECT DISTINCT sType FROM smartphone");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				RAM: 
				<?php
					echo '<select name="ram">
							<option value="">-RAM size-</option>';
					$value=$_POST ["ram"];
					$fetch = mysql_query("SELECT DISTINCT RAM FROM smartphone GROUP BY RAM");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";

				?>
				
				ROM: 
				<?php
					echo '<select name="rom">
							<option value="">-ROM size-</option>';
					$value=$_POST ["rom"];
					$fetch = mysql_query("SELECT DISTINCT ROM FROM smartphone GROUP BY ROM");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				Operating System: 
				<?php
					echo '<select name="os">
							<option value="">-Operating System-</option>';
					$value=$_POST ["os"];
					$fetch = mysql_query("SELECT DISTINCT OS FROM smartphone GROUP BY OS");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				Manufacturer: 
				<?php
					echo '<select name="manufacturer">
							<option value="">-Manufacturer-</option>';
					$value=$_POST ["manufacturer"];
					$fetch = mysql_query("SELECT DISTINCT Manufacturer FROM smartphone GROUP BY Manufacturer");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				Sort By: 
				<select name="sort_by">
					<option value="Stock_NUM">ID</option>
					<option value="Sale_price">Price</option>
					<option value="Battery">Battery</option>
					<option value="Weight">Weight</option>
					<option value="sSize">Screen Size</option>
					<option value="Camera">Camera</option>
				</select>
				
				<input type="radio" name="sort_type" checked="checked" value="ASC">Asc
				<input type="radio" name="sort_type" value="DESC">Desc<br><br>


				<input class="btn btn-primary" type="submit" value="Submit"/>  </center>  
				  </fieldset>
			</form>
			
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			  Add Smartphone
			</button>
			
			<!--  Add Smartphone START-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Add Smartphone</h4>
				  </div>
				  <div class="modal-body">
					<form action="stock.php" method="post">
					<input type="hidden" name="add_smartphone" value="add_smartphone" />
						IMEI Number: <input type="text" id="imei" name="imei"><br><br>
						Phone Name: <input type="text" id="name" name="name"><br><br>
						Phone Weight: <input type="text" id="weight" name="weight"><br><br>
						Screen Size: <input type="text" id="sSize" name="sSize"><br><br>
						ROM: <input type="text" id="rom" name="rom"><br><br>
						RAM: <input type="text" id="ram" name="ram"><br><br>
						OS: <input type="text" id="os" name="os"><br><br>
						Price: <input type="text" id="price" name="price"><br><br>
						Battery: <input type="text" id="battery" name="battery"><br><br>
						Camera: <input type="text" id="camera" name="camera"><br><br>
						Manufacturer: <input type="text" id="manf" name="manf"><br><br>
						Warranty: <input type="text" id="warranty" name="warranty"><br><br>
			
						Smartphone Type: 
						<?php
							echo '<select name="sType">
									<option value="">-Smartphone Type-</option>';
							$value=$_POST ["sType"];
							$fetch = mysql_query("SELECT DISTINCT sType FROM smartphone");


							while($throw = mysql_fetch_array($fetch)) {
							echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
							}
							echo "</select>";


						?><br><br>
						

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input class="btn btn-primary" type="submit" value="Submit"/>   
					
					</div>
					</form>
				  </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!--  Add an Smartphone END-->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
	</div>
<?php
if(isset($_POST['add_smartphone'])) 
{
$IMEI = ($_POST['imei']);
$Name = ($_POST['name']);
$Weight = ($_POST['weight']);
$sSize = ($_POST['sSize']);
$ROM = ($_POST['rom']);
$RAM = ($_POST['ram']);
$OS = ($_POST['os']);
$Price = ($_POST['price']);
$Battery = ($_POST['battery']);
$Camera = ($_POST['camera']);
$Manf = ($_POST['manf']);
$Warranty = ($_POST['warranty']);
$sType = ($_POST['sType']);

	$sql = "INSERT INTO smartphone(IMEI, Name, Weight, sSize, ROM, RAM, OS, Sale_Price, Battery, Camera, Manufacturer, Warranty, sType) 
			VALUES ('$IMEI', '$Name', '$Weight', '$sSize', '$ROM', '$RAM', '$OS', '$Price', '$Battery', '$Camera', '$Manf', '$Warranty', '$sType');";
	$qry = mysql_query($sql);
    if( $qry ){
		echo '<div class="alert alert-success">Smartphone has been added successfully.</div>'; 
	}
	else{
		die('Invalid query: ' . mysql_error());
	}


}
?>
	
<?php
if(isset($_POST['task']))
{
$sType = ($_POST['sType']);
$RAM = ($_POST['ram']);
$ROM = ($_POST['rom']);
$OS = ($_POST['os']);
$Manf = ($_POST['manufacturer']);
$Sort = ($_POST['sort_by']);
$Sort_Type = ($_POST['sort_type']);

	$query="SELECT * FROM smartphone WHERE (sType LIKE '%$sType%') AND (RAM LIKE '%$RAM%') AND (ROM LIKE '%$ROM%') AND (OS LIKE '%$OS%') AND (Manufacturer LIKE '%$Manf%') ORDER BY $Sort $Sort_Type";
    $result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 

		if (mysql_num_rows($result) > 0) { 

			while($row = mysql_fetch_row($result)) { 
				$sNum = $row[0];
				$IMEI = $row[1];
				$Name = $row[2];
				$Weight = $row[3];
				$sSize = $row[4];
				$ROM = $row[5];
				$RAM = $row[6];
				$OS = $row[7];
				$Price = number_format($row[8], 2);
				$Battery = $row[9];
				$Camera = $row[10];
				$Manf = $row[11];
				$Warranty = $row[12];
				$sType = $row[13];

				echo '
					<ul class="col-md-3 ">
                            <div class="thumbnail">
                                <div class="span3">
                                <center><img
                                     src="img/phone.png"
                                     alt="Phone Pic">
								</div></center>
								<br/>
								<div class="span6">		
								<center>
								<table class="table">
								<tr><td><h5><b>Stock ID: </b></h5></td><td>'.$sNum.'</td></tr>
								<tr><td><h5><b>Phone Name: </b></h5></td><td>'.$Name.'</td></tr>
								<tr><td><h5><b>IMEI #: </b></h5></td><td>'.$IMEI.'</td></tr>
								<tr><td><h5><b>ROM: </b></h5></td><td>'.$ROM.' GB</td></tr>
								<tr><td><h5><b>RAM: </b></h5></td><td>'.$RAM.' GB</td></tr>
								<tr><td><h5><b>Operating System:  </b></h5></td><td>'.$OS.'</td></tr>
								<tr><td><h5><b>Battery:  </b></h5></td><td>'.$Battery.' mAH</td></tr>
								<tr><td><h5><b>Camera:  </b></h5></td><td>'.$Camera.' MP</td></tr>
								<tr><td><h5><b>Warranty:  </b></h5></td><td>'.$Warranty.' years</td></tr>
								<tr><td><h5><b>Phone Type:  </b></h5></td><td>'.$sType.'</td></tr>
								<tr><td><h5><b>Sale Price:  </b></h5></td><td>$'.$Price.'</td></tr>
								</table>
								</center>
								</div>
								
								<center>
								<form action="stock.php" method="post">
									<input type="hidden" name="delete_smartphone" value='.$sNum.' />
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