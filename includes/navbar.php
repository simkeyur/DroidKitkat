<?php   
include('includes/config.php'); 
?>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"  class="fa fa-globe" href="index.php">Droid4Sale</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
         
			<ul class="nav navbar-nav navbar-right navbar-user">
           
            <li >
              <a href="tables.php" ><i class="fa fa-bar-chart-o"></i> Table Data</a>
            </li>
			<li >
              <a href="employees.php" ><i class="fa fa-user"></i> Employees</a>
            </li>
			<li >
              <a href="orders.php" ><i class="fa fa-shopping-cart"></i> Orders</a>
            </li>
			<li >
              <a href="stock.php" ><i class="fa fa-truck"></i> Stock</a>
            </li>
			<li >
              <a href="warehouse.php" ><i class="fa fa-home"></i> Warehouse</a>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li><a target="_blank" href="http://simkeyur.com/"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
		  
	
        </div><!-- /.navbar-collapse -->
      </nav>