<?php
	$result = shell_exec("amixer get HDMI");
	preg_match('/[0-9].%/', $result, $golf);
	$result2 = str_replace(": values=", "", $golf[0]);
	$result2 = str_replace("%", "", $result2);
	echo $result2;
?>
