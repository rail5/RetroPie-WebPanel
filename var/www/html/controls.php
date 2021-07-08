<?php
if (!isset($_GET['action'])) {
	die('I Am Error');
}
$action= $_GET['action'];

if ($action == "volume") {
	$volume = $_GET['volume'];
	if (!is_numeric($volume)) {
		die('I Am Error');
	} else {
		$volume = escapeshellarg($volume); //probably unnecessary precaution

		if ($volume > 100) {
			$volume = 100; //avoid fuzzing with 6000% volume etc
		} else if ($volume < 0) {
			$volume = 0; //avoid fuzzing with negative values
		}

		$result = shell_exec('amixer -c 0 -- cset numid=1 '.$volume.'%');
	}
} else if ($action == "search") {
	require('./functions/search.php'); // load search page
} else if ($action == "softreset") {
	require('./functions/reset.php'); // reset emulationstation
	softReset();
} else if ($action == "hardreset") {
	require('./functions/reset.php'); // reboot machine (not implemented, does nothing)
	hardReset();
} else if ($action == "start") {
	if (!isset($_GET['system']) || !isset($_GET['rom'])) {
		die('I Am Error');
	}
	$system = $_GET['system'];
	$rom = $_GET['rom'];
	require('./functions/start.php');
	launchGame($system, $rom); // start requested game

	if (isset($_GET['sterm'])) {
		$sterm = $_GET['sterm'];
		header('location: /controls.php?action=search&platform='.$system.'&search='.$sterm);
	} else {
		header('location: /includes/search.html');
	}
}
?>
