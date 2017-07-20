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
?>
