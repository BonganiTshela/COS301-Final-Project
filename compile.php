<?php
	`del *.class`;
	$command = '"C:\Program Files\Java\jdk1.8.0_65\bin\javac.exe" *.java 2>&1';
	echo passthru($command, $err);
	if ($err) {
		echo "<br>Compilation contains errors";
	} else {
		echo "<br>Compilation completed without errors";
		echo `java Main`;
	}

	$_SESSION['runtime'] = file_get_contents('./runtime.json', true);
	$_SESSION['memoryUsage'] = file_get_contents('./memoryUsage.json', true);
	$_SESSION['CPULoad'] file_get_contents('./CPULoad.json', true);

?>
