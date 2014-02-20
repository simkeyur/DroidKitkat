<!DOCTYPE html>

<?php   
require "includes/config.php";  
?>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Droid4sale</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	
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
            <h1>Dashboard <small>Statistics Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
		
		  
		  <!--Panel start-->
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-group fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <?php
					$result = mysql_query("select count(1) FROM employee");
					$row = mysql_fetch_array($result);

					$total = $row[0];
					echo '<p class="announcement-heading">'.$total.'</p>';
					?>
                    <p class="announcement-text">Total Employees</p>
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
          </div>
		  <!--Panel END-->
		  
		  <!--Panel start-->
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-mobile fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <?php
					$result = mysql_query("select count(1) FROM smartphone");
					$row = mysql_fetch_array($result);

					$total = $row[0];
					echo '<p class="announcement-heading">'.$total.'</p>';
					?>
                    <p class="announcement-text">Smartphones</p>
                  </div>
                </div>
              </div>
              <a href="stock.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Stock
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
		  <!--Panel END-->
		  
		  <!--Panel START-->
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
					<?php
					$result = mysql_query("select count(1) FROM orders");
					$row = mysql_fetch_array($result);

					$total = $row[0];
					echo '<p class="announcement-heading">'.$total.'</p>';
					?>
                    <p class="announcement-text">New Orders!</p>
                  </div>
                </div>
              </div>
              <a href="orders.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Orders
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
		  <!--Panel END-->
		  
		  <!--Panel start-->
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-money fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
				  <?php
					$result = mysql_query("select SUM(Price) AS repaired_smartphones FROM orders");
					$row = mysql_fetch_row($result);

					$total = $row[0];
					echo '<p class="announcement-heading">$'.$total.'</p>';
					?>
                
                    <p class="announcement-text">Total Revenue</p>
                  </div>
                </div>
              </div>
              <a href="warehouse.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Revenue
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
		  <!--Panel End-->
        </div><!-- /.row -->
		
		


         
          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i><?php $result = mysql_query("SELECT * FROM orders, smartphone WHERE orders.IMEI = smartphone.IMEI order by orders.Order_ID desc limit 7;"); 
			echo "  Recent Orders";?></h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Order # <i class="fa fa-sort"></i></th>
                        <th>Device Name <i class="fa fa-sort"></i></th>
						<th>Order Date <i class="fa fa-sort"></i></th>
                        <th>Amount (USD) <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row = mysql_fetch_array($result)) : ?>
			  <tr>
				<td><?php echo $row['Order_ID']; ?></td>
				<td><?php echo $row['Name']; ?></td>
				<td><?php echo $row['Order_Date']; ?></td>
				<td><?php echo $row['Price']; ?></td>
			  </tr>
			  <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="orders.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
		  
		  
		  
		  <div class="col-lg-8">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments"></i><?php $result = mysql_query("SELECT * FROM feedback;"); 
			echo "  Recent Reviews";?></h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Review # <i class="fa fa-sort"></i></th>
                        <th>Device Name <i class="fa fa-sort"></i></th>
						<th>Customer<i class="fa fa-sort"></i></th>
                        <th>Date <i class="fa fa-sort"></i></th>
						<th>Comments <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					  if($result === FALSE) {
							die(mysql_error()); // TODO: better error handling
						}
					  
					  while($row = mysql_fetch_array($result)) : ?>
					  <tr>
						<td><?php echo $row['Feedback_ID']; ?></td>
						<td><?php echo $row['item_name']; ?></td>
						<td><?php echo $row['Person_name']; ?></td>
						<td><?php echo $row['Feedback_Date']; ?></td>
						<td><?php echo $row['Comments']; ?></td>
					  </tr>
					  <?php endwhile; ?>
							</tbody>
						  </table>
						</div>
						<div class="text-right">
						  <a href="tables.php">View All Reviews <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					  </div>
					</div>
				  </div>
		  
		  

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
  </body>
</html>
