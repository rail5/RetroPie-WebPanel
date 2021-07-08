<?php
function launchGame($system, $rom) {

	$game = str_replace("/home/pi/RetroPie/roms/".$system."/", "", $rom);
	$game = preg_replace("/\..*/i", "", $game);

// Here we kill any currently running games and the frontend if it's running

	$clearaspace1 = shell_exec("sudo -u pi killall emulationstatio"); // Why doesnt the process name have an 'n' at the end?
	$clearaspace2 = shell_exec("sudo -u pi killall retroarch"); // kills any game running except commodore 64 games
	$clearaspace3 = shell_exec("sudo -u pi killall c64");


	$currentstoredstatus = file_get_contents("/home/pi/.gamelogs/nowplaying.txt");
	if ($currentstoredstatus !== "None".PHP_EOL) {
		$endlog = shell_exec("sudo -u pi /home/pi/.emulationstation/scripts/game-end/1-logend.sh");
	} // Unless what's currently stored in "Now playing" is "None," move that over to "Last Played"
	// This runs so that if we actually did kill a game, the logs keep running accurately

	$startlog = shell_exec('sudo -u pi /home/pi/.emulationstation/scripts/game-start/1-logstart.sh '.$system.' "'.$game.'"');

	$command = '/opt/retropie/supplementary/runcommand/runcommand.sh 0 _SYS_ '.$system.' "'.$rom.'"';
	$result = shell_exec("sudo -u pi script --return --quiet -c '".$command."' /dev/null");

}

?>
