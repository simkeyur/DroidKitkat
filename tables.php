<?php   
require "includes/config.php";  
?>


<!-- Drop all the tables -->
<?php
	if(isset($_POST['delete_tables'])) {
		$sql = "DROP TABLE IF EXISTS stock,feedback,returns,orders,warehouse,repair_center,supplier,smartphone,employee,customer,person";
        $qry = mysql_query( $sql );
	}
?>		

<!-- Create all the Tables and Insert Data -->
<?php
	if(isset($_POST['create_tables'])) {
		// Name of the file
		$filename = 'sql/myDBcreate.sql';


		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		// Loop through each line
		foreach ($lines as $line)
		{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			// Reset temp variable to empty
			$templine = '';
		}
		}
	}
?>	

<!-- Update the Tables and Insert Data as required -->
<?php
	if(isset($_POST['update_tables'])) {
		// Name of the file
		$filename = 'sql/myDBupdate.sql';


		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		// Loop through each line
		foreach ($lines as $line)
		{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			// Reset temp variable to empty
			$templine = '';
		}
		}
	}
?>	


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Table Structure - Droid4sale</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<style type="text/css">
	
	table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
	table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
	table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
	</style>
  </head>

  <body>

    <div>

      <!-- Sidebar -->
		<?php
		//navigation
		include_once('includes/navbar.php');
		?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Table Structure</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Table Structure</li>
            </ol>
			
			
			 <div class="row">
			  <div class="col-lg-12">
				<div class="bs-example">
				  <div class="jumbotron">
					<h1>Fun with Tables</h1>
					<p>Below is the list of all the tables. You can drop all the tables/create/update by just hitting the buttons</p>
					<form method="post">
					 <p>
					 <input type="submit" class="btn btn-primary btn-lg" name="delete_tables" value="Drop All Tables" />
					 <input type="submit" class="btn btn-primary btn-lg" name="create_tables" value="Create All Tables" />
					 <input type="submit" class="btn btn-primary btn-lg" name="update_tables" value="Update Tables" />
					 </p>
					</form>
				  </div>
				</div>
			  </div>
			</div><!-- /.row -->
			
						
			<?php


			 include_once('includes/display_tables.php');
				$result = mysql_query("SHOW TABLES");	
				while($tableName = mysql_fetch_row($result)) {

					$table = $tableName[0];
					
					echo display($table);
				}

			?>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>