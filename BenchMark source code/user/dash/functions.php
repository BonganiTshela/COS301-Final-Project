<?php

	function newConnection() {
		$conn = new mysqli("localhost", "root", "", "final_project");
		return $conn;
	}

	function storeResults($userID) {
		$jsonPath = "bench/benchmarking/json";
		$files = scandir($jsonPath, 0);
		$count = count($files) / 3;
		
		$conn = newConnection();
		
		$c = "";
		$m = "";
		$r = "";
		for ($k = 1; $k <= $count; $k++)
			if (
				file_exists($jsonPath . "/CPULoad" . $k . ".json") &&
				file_exists($jsonPath . "/memoryUsage" . $k . ".json") &&
				file_exists($jsonPath . "/runtime" . $k . ".json")
			) {
				$filename = $jsonPath . "/CPULoad" . $k . ".json";
				$handle = fopen($filename, "r");
				$c = fread($handle, filesize($filename));
				fclose($handle);
				
				$filename = $jsonPath . "/memoryUsage" . $k . ".json";
				$handle = fopen($filename, "r");
				$m = fread($handle, filesize($filename));
				fclose($handle);
				
				$filename = $jsonPath . "/runtime" . $k . ".json";
				$handle = fopen($filename, "r");
				$r = fread($handle, filesize($filename));
				fclose($handle);
				
				$sql = "INSERT INTO files (userid, CPU, RAM, ELAPSED) VALUES (" . $userID . ", " . $c . ", " . $m . ", " . $r . ");";
				$conn->query($sql);
			}
		
		$conn->close();
	}

	// returns array, just jsonify to show as chart data
	function getResults($userID, $benchmarkID) {
		$conn = newConnection();
		$results = $conn->query("select * from files where userid = " . $userID . " and benchmarkid = " . $benchmarkID);
		$arr = array();
		while ($row = $results->fetch_assoc()) {
			$line['CPU'] = $row['CPU'];
			$line['RAM'] = $row['RAM'];
			$line['ELAPSED'] = $row['ELAPSED'];
		}
		$conn->close();
		return $arr;
	}

?>