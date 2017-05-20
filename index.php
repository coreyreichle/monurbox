<?php
echo "<html>\n<meta http-equiv='refresh' content='300'>\n<title>Monitoring Report</title>\n<body>\n<table width='400'>\n<tr align='left'><th>Host</th><th>Service</th><th>Status</th></tr>\n";

$hosts="";

if (isset($_GET['hosts'])) {
	$hosts = $_GET["hosts"];
}
if ( $hosts !="all" ) { $hosts = "failed"; }

$f = fopen("/tmp/report", "r");

echo "Last update: " . date ("H:i", filemtime('/tmp/report'))."<p>\n";
if ( $hosts == "all" ) { echo "<a href='./index.php?hosts=failed'>Failures Only</a><p>\n"; }
else { echo "<a href='./index.php?hosts=all'>All</a><p>\n"; }

while (($line = fgetcsv($f)) !== false) {
	echo "<tr>";
	if ($hosts == "failed" ) {
		if ($line[2] == "FAILED") {
			foreach ($line as $cell) {
				if ($cell == "FAILED") {
						echo '<td style="color:#FF0000">' . htmlspecialchars($cell) . '</td>';
				}
				else {
					echo "<td>" .htmlspecialchars($cell) . "</td>"; 
				}
			}
		}
	}
	elseif ($hosts == "all") {
		foreach ($line as $cell) {
			if ($cell == "FAILED") {
			echo '<td style="color:#FF0000">' . htmlspecialchars($cell) . '</td>';
		}         
		elseif ($cell=="GOOD") {
			echo '<td style="color:#00FF00">' . htmlspecialchars($cell) . "</td>";
		}         
		else {    
			echo "<td>" .htmlspecialchars($cell) . "</td>"; 
      }         
		}
	}
	echo "</tr>\n";
}
echo "\n</table><p>\n";
fclose($f);
echo "</body></html>";
