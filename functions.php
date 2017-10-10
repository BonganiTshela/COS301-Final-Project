<?php

	function storeResults() {
		$files = scandir("bench/benchmarking/json", 0);
		$count = count($files) / 3;
		
		// TODO: store results from json files into db
	}

	// returns array, just jsonify to show as chart data
	function getResults($userID, $benchmarkID) {
		$conn = new mysqli("localhost", "root", "", "final_project");
		$results = $conn->query("select * from files where userid = " . $userID . " and benchmarkid = " . $benchmarkID);
		$arr = array();
		while ($row = $results->fetch_assoc()) {
			$line = array();
			array_push($line, $row['algoName']);
			array_push($line, $row['CPU']);
			array_push($line, $row['RAM']);
			array_push($line, $row['ELAPSED']);
			array_push($arr, $line);
		}
		
		$final = array();
		$c = array();
		$r = array();
		$e = array();
		for ($k = 0; k < count($arr); $k++) {
			$temp = array();
			$temp['label'] = $arr[$k][0];
			$temp['value'] = $arr[$k][1];
			array_push($c, $temp);
			
			$temp['value'] = $arr[$k][2];
			array_push($r, $temp);
			
			$temp['value'] = $arr[$k][3];
			array_push($e, $temp);
		}
		
		$t = array();
		$t['data'] = $c;
		array_push($final, $t);
		$t['data'] = $r;
		array_push($final, $t);
		$t['data'] = $e;
		array_push($final, $t);
		
		return $final;
	}

?>
