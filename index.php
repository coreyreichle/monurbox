<?php
echo "<html><title>Monitoring Report</title><body><table width='400'><tr align='left'><th>Host</th><th>Service</th><th>Status</th></tr>";
$f = fopen("/tmp/report", "r");
while (($line = fgetcsv($f)) !== false) {
	echo "<tr>";
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
	echo "</tr>\n";
}

fclose($f);
echo "\n</table></body></html>";
