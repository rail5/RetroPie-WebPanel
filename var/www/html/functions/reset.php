<?php

function softReset() {
	$part1 = shell_exec("sudo -u pi killall emulationstatio");
	$part2 = shell_exec("sudo -u pi killall retroarch");
	$part3 = shell_exec("sudo -u pi killall c64");

	// check if we need to move "now playing" into "last played"
	$check = file_get_contents("/home/pi/.gamelogs/nowplaying.txt");
	if ($check !== "None".PHP_EOL) {
		// if we do need to, then do it
		$middlepart = shell_exec("sudo -u pi /home/pi/.emulationstation/scripts/game-end/1-logend.sh");
	}

	$part4 = shell_exec("sudo -u pi emulationstation");
}

function hardReset() {
//	$onlypart = shell_exec("sudo -u pi reboot");
}
?>
