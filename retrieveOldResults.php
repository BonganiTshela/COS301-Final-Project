<?php
	// connect to db etc
	$sessions = array();
	
	$result = $db->query("SELECT benchSession FROM files WHERE userid = " . $_SESSION['id'] . " GROUP BY benchSession;");
	while ($row = $db->fetch_assoc()) {
		array_push($sessions, $row['benchSession']);
	
?>

<!doctype html>

<html>
	<head>
		<title>Stored Results</title>
		
	</head>
	
	<body>
		<?php
			
			foreach ($sessions as $session) {
				$sql = "SELECT * FROM files WHERE userid = " . $_SESSION['id'] . " AND benchSession = " . $session;
				$result = $db->query($sql);
				
				$name = array();
				$cpu = array();
				$ram = array();
				$elapsed = array();
				$power = array();
				$heat = array();
				
				while ($row = $db->fetch_assoc()) {
					array_push($name, $row['Algoname']);
					array_push($cpu, $row['CPU']);
					array_push($ram, $row['RAM']);
					array_push($elapsed, $row['ELAPSED']);
					array_push($power, $row['POWER']);
					array_push($heat, $row['HEAT']);
				}
				
				$length = count($name);
				
				// =========================================== CPU
				
				$cpuData = array(
					"chart" => array(
						"caption" => "CPU",
						"showValues" => "0",
						"theme" => "ocean"
					)
				);
				$cpuData['data'] = array();
				for ($k = 0; $k < $length; $k++)
					array_push($cpuData['data'], array(
						"label" => $name[$k],
						"value" => $cpu[$k]
					)
				);
				$cpuJson = json_encode($cpuData);
				
				// =========================================== RAM
				
				$ramData = array(
					"chart" => array(
						"caption" => "RAM",
						"showValues" => "0",
						"theme" => "ocean"
					)
				);
				$ramData['data'] = array();
				for ($k = 0; $k < $length; $k++)
					array_push($ramData['data'], array(
						"label" => $name[$k],
						"value" => $ram[$k]
					)
				);
				$ramJson = json_encode($ramData);
				
				// =========================================== ELAPSED
				
				$elapsedData = array(
					"chart" => array(
						"caption" => "ELAPSED",
						"showValues" => "0",
						"theme" => "ocean"
					)
				);
				$elapsedData['data'] = array();
				for ($k = 0; $k < $length; $k++)
					array_push($elapsedData['data'], array(
						"label" => $name[$k],
						"value" => $elapsed[$k]
					)
				);
				$elapsedJson = json_encode($elapsedData);
				
				// =========================================== POWER
				
				$powerData = array(
					"chart" => array(
						"caption" => "POWER",
						"showValues" => "0",
						"theme" => "ocean"
					)
				);
				$powerData['data'] = array();
				for ($k = 0; $k < $length; $k++)
					array_push($powerData['data'], array(
						"label" => $name[$k],
						"value" => $power[$k]
					)
				);
				$powerJson = json_encode($powerData);
				
				// =========================================== HEAT
				
				$heatData = array(
					"chart" => array(
						"caption" => "HEAT",
						"showValues" => "0",
						"theme" => "ocean"
					)
				);
				$heatData['data'] = array();
				for ($k = 0; $k < $length; $k++)
					array_push($heatData['data'], array(
						"label" => $name[$k],
						"value" => $heat[$k]
					)
				);
				$heatJson = json_encode($heatData);
				
				// =========================================== ECHO OUTPUTS
				
				echo "<div class='benchResult'>"; // <------------------ dummy name
				
				echo "
					<table>
						<tr>
							<th>Name</th>
							<th>CPU</th>
							<th>RAM</th>
							<th>Elapsed</th>
							<th>Power</th>
							<th>Heat</th>
						</tr>";
				for ($k = 0; $k < $length; $k++)
					echo "<tr>
						<td>" . $name[$k] . "</td>
						<td>" . $cpu[$k] . "</td>
						<td>" . $elapsed[$k] . "</td>
						<td>" . $power[$k] . "</td>
						<td>" . $heat[$k] . "</td>
					</tr>";
				echo "</table>";
				
				$cpuChart = new FusionCharts("column2D", $session . "cpu", 600, 300, "cpu" . $session, "json", $cpuJson);
				$cpuChart->render();
				echo "<div id='cpu" . $session . "'></div>";
				
				$ramChart = new FusionCharts("column2D", $session . "ram", 600, 300, "ram" . $session, "json", $ramJson);
				$ramChart->render();
				echo "<div id='ram" . $session . "'></div>";
				
				$elapsedChart = new FusionCharts("column2D", $session . "elapsed", 600, 300, "elapsed" . $session, "json", $elapsedJson);
				$elapsedChart->render();
				echo "<div id='elapsed" . $session . "'></div>";
				
				$powerChart = new FusionCharts("column2D", $session . "power", 600, 300, "power" . $session, "json", $powerJson);
				$powerChart->render();
				echo "<div id='power" . $session . "'></div>";
				
				$heatChart = new FusionCharts("column2D", $session . "heat", 600, 300, "heat" . $session, "json", $heatJson);
				$heatChart->render();
				echo "<div id='heat" . $session . "'></div>";
				echo "</div>";
			}
			
			unset($session);
		?>
