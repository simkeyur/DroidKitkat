<!DOCTYPE html>

<?php   
require "includes/config.php";  
?>




<?php
if(isset($_POST['delete_employee'])) {
		  $delete_id = mysql_real_escape_string($_POST['delete_employee']);
		  mysql_query("DELETE FROM employee WHERE `EId`=".$delete_id);
		  mysql_query("DELETE FROM person WHERE `Id`=".$delete_id);
		  header('Location: employees.php');
		}
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employees - Droid4sale</title>

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
		  <h1>Employees <small>Droid4sale</small></h1>
			<form action="employees.php" method="post">
			<input type="hidden" name="task" value="employees" />
			  <fieldset>
			   <center>
				
				Employee Type: 
				<?php
					echo '<select name="eType">
						<option value="">-Employee Type-</option>';
					$value=$_POST ["eType"];
					$fetch = mysql_query("SELECT DISTINCT eType FROM employee");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				Work Location: 
				<?php
					echo '<select name="work_location">
							<option value="">-Work Location-</option>';
					$value=$_POST ["work_location"];
					$fetch = mysql_query("SELECT DISTINCT Work_location FROM employee");


					while($throw = mysql_fetch_array($fetch)) {
					echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
					}
					echo "</select>";


				?>
				
				Sort By: 
				<select name="sort_by">
					<option value="EId">Employee ID</option>
					<option value="DOB">Birth Date</option>
					<option value="J_date">Join Date</option>
					<option value="Salary">Salary</option>
				</select>
				
				<input type="radio" name="sort_type" checked="checked" value="ASC">Asc
				<input type="radio" name="sort_type" value="DESC">Desc


				<input class="btn btn-primary" type="submit" value="Submit"/>  </center>  
				  </fieldset>
			</form>
			<center>
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			  Add Employee
			</button>
			</center>
			<!--  Add an Employee START-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Add Employee</h4>
				  </div>
				  <div class="modal-body">
					<form action="employees.php" method="post">
					<input type="hidden" name="add_employee" value="add_employee" />
						Employee ID: <input type="text" id="eid" name="eid"><br><br>
						Employee Name: <input type="text" id="name" name="name"><br><br>
						Employee Address: <input type="text" id="address" name="address"><br><br>
						Employee Phone: <input type="text" id="phone" name="phone"><br><br>
						Employee SSN: <input type="text" id="SSN" name="SSN"><br><br>
						Work Location: 
						<?php
							echo '<select name="work_location">
									<option value="">-Work Location-</option>';
							$value=$_POST ["work_location"];
							$fetch = mysql_query("SELECT DISTINCT Work_location FROM employee");


							while($throw = mysql_fetch_array($fetch)) {
							echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
							}
							echo "</select>";


						?><br><br>
						Employee Type: 
						<?php
							echo '<select name="eType">
								<option value="">-Employee Type-</option>';
							$value=$_POST ["eType"];
							$fetch = mysql_query("SELECT DISTINCT eType FROM employee");


							while($throw = mysql_fetch_array($fetch)) {
							echo '<option   value='.$throw[0].'>'.$throw[0].'</option>';
							}
							echo "</select>";


						?><br><br>
						Employee Join Date: <input type="date" id="jdate" name="jdate"><br><br>
						<input type="radio" name="sex" value="male">Male
						<input type="radio" name="sex" value="female">Female<br><br>
						Employee Salary: <input type="text" id="salary" name="salary"><br><br>
						Employee DOB: <input type="date" id="bdate" name="bdate"><br><br>
						  

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input class="btn btn-primary" type="submit" value="Submit"/> 
						
					</div>
					</form>
				  </div>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!--  Add an Employee END-->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
	</div>
<?php
if(isset($_POST['add_employee'])) 
{
$eID = ($_POST['eid']);
$Name = ($_POST['name']);
$eType = ($_POST['eType']);
$Address = ($_POST['address']);
$Phone = ($_POST['phone']);
$Location = ($_POST['work_location']);
$Gender = ($_POST['sex']);
$SSN = ($_POST['SSN']);
$Jdate = ($_POST['jdate']);
$DOB = ($_POST['bdate']);
$Salary = ($_POST['salary']);

	$sql = "INSERT INTO person(Id, Name, Address, Phone) VALUES ( '$eID', '$Name', '$Address', '$Phone');";
	$qry = mysql_query($sql);
	$sql1 =	"INSERT INTO employee(EId, SSN, Work_location, J_date, Gender, Salary, DOB, eType) VALUES ( '$eID', '$SSN', '$Location', '$Jdate', '$Gender', '$Salary', '$DOB', '$eType');";
	$qry1 = mysql_query($sql1);
    if( $qry1 ){
		echo '<div class="alert alert-success">Employee has been added successfully.</div>'; 
	}
	else{
		die('Invalid query: ' . mysql_error());
	}


}
?>
	
<?php
if(isset($_POST['task']))
{
$work_location = ($_POST['work_location']);
$empType = ($_POST['eType']);
$Sort = ($_POST['sort_by']);
$Sort_Type = ($_POST['sort_type']);

	$query="SELECT * FROM employee WHERE (Work_location LIKE '%$work_location%') AND (eType LIKE '%$empType%') ORDER BY $Sort $Sort_Type";
    $result = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 

		if (mysql_num_rows($result) > 0) { 

			while($row = mysql_fetch_row($result)) { 
				$Eid = $row[0];
				$SSN = $row[1];
				$Salary = number_format($row[5], 2);
				$Work_location = $row[2];
				$Join_date = $row[3];
				$eType = $row[7];

				echo '
					<ul class="col-md-3 ">
                            <div class="thumbnail">
                                <div class="span3">
                                <center><img class="img-circle"
                                     src="img/photo.png"
                                     alt="User Pic">
								</div></center>
								<br/>
								<div class="span6">		
								<center>
								<table class="table">
								<tr><td><h5><b>Employee ID: </b></h5></td><td>'.$Eid.'</td></tr>
								<tr><td><h5><b>SSN #: </b></h5></td><td>'.$SSN.'</td></tr>
								<tr><td><h5><b>Work Location: </b></h5></td><td>'.$Work_location.'</td></tr>
								<tr><td><h5><b>Join date: </b></h5></td><td>'.$Join_date.'</td></tr>
								<tr><td><h5><b>Salary:  </b></h5></td><td>'.$Salary.'</td></tr>
								<tr><td><h5><b>Employee Type:  </b></h5></td><td>'.$eType.'</td></tr>
								</table>
								</center>
								</div>
								
								<center>
								<form action="employees.php" method="post">
									<input type="hidden" name="delete_employee" value='.$Eid.' />
									<input type="submit" class="btn btn-primary" value="Delete" />
								</form>
								</center>
								
						   </div>
                    </ul>';
				

			} 

 
		} 
		else { 
			echo "No Employees found!"; 
		} 

}

?>

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>