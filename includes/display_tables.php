<?php
function display($table_name){

		$results = mysql_query("show columns from `" . $table_name . "`");
		for ($n = 0; $n < mysql_num_rows($results); $n++) {
			$row = mysql_fetch_assoc($results);
			$columns[$n] = $row;
		}
		$columns_count = count($columns);
		echo "<h1>".$table_name."</h1>";
		
		echo '
            
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
					<tr>';
		for($i = 0;$i < $columns_count;$i++) {
			echo "<td><strong>" . $columns[$i]['Field'] . "</strong></td>";
		}
		
		echo "</tr>";

		$results = mysql_query("select * from `" . $table_name . "`");
		for ($n = 0; $n < mysql_num_rows($results); $n++) {
			$row = mysql_fetch_assoc($results);
			$contents[$n] = $row;
		}
		$total = count($contents);

		for($ii = 0;$ii < $total;$ii++) {
			echo "<tr>";
			for($i = 0;$i < $columns_count;$i++) {
				echo "<td>" . $contents[$ii][$columns[$i]['Field']] . "</td>";	
			}
			
		}
		echo "</thead></table></div>";
		
	}
?>