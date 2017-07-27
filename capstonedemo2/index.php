<?php
    require("fusioncharts.php");

	`del *.class`;
	$command = '"C:\Program Files\Java\jdk1.8.0_65\bin\javac.exe" *.java 2>&1';
	echo passthru($command, $err);

    $runtime = '';
    $memoryUsage = '';
    $CPULoad = '';

	if ($err) {
		echo "<br>Compilation contains errors";
	} else {
		`java Main`;
        
        $runtime = file_get_contents('./runtime.json', true);
        $memoryUsage = file_get_contents('./memoryUsage.json', true);
        $CPULoad = file_get_contents('./CPULoad.json', true);
	}
?>

<html>
    <head>
        <script src="fc/js/fusioncharts.js"></script>
        <script src="fc/js/themes/fusioncharts.theme.ocean.js"></script>
    </head>
    
    <body>
        
        
        <h1>Runtime</h1>
        <?php 
            $runtimeChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", "'" . $runtime . "'");
            $runtimeChart->render(); 
        ?>
        <div id="chart-1"></div>
        
        <h1>Memory</h1>
        <?php 
            $memoryChart = new FusionCharts("column2d", "ex2", "100%", 400, "chart-2", "json", "'" . $memoryUsage . "'");
            $memoryChart->render(); 
        ?>
        <div id="chart-2"></div>
        
        <h1>CPU</h1>
        <?php 
            $CPUChart = new FusionCharts("column2d", "ex3", "100%", 400, "chart-3", "json", "'" . $CPULoad . "'");
            $CPUChart->render(); 
        ?>
        <div id="chart-3"></div>
    
    </body>
</html>