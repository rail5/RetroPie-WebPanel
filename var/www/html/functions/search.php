<!DOCTYPE html>
<html>
<head>
<title>search</title>
</head>
<body>
<div align="center">
<form action="/controls.php" method="get">
<input type="hidden" name="action" value="search">
Search for games:<br>
<input type="text" name="search" placeholder="game..."> on platform <select name="platform">
<option value="nes">NES</option>
<option value="snes">SNES</option>
<option value="atari2600">Atari 2600</option>
<option value="gbc">GBC</option>
<option value="gba">GBA</option>
<option value="c64">Commodore 64</option>
</select> <input type="submit"></form><br>
<?php

if (!isset($_GET['search'])) {
	die('I Am Error');
}
if (!isset($_GET['platform'])) {
	$platform = "all";
} else {
	$platform = $_GET['platform'];
}

$search = $_GET['search'];

$search = escapeshellarg($search);

$platform = escapeshellcmd($platform);

if ($platform == "all") {
	//do a search on all platforms
	//not implemented
} else {
	$systems = shell_exec('ls /home/pi/RetroPie/roms/');
	$acceptableinput = explode(PHP_EOL, $systems);

	if (!in_array($platform, $acceptableinput)) {
		die('I Am Error');
	}

	$result = shell_exec('ls /home/pi/RetroPie/roms/'.$platform.'/ | grep -i '.$search);
//	echo $result;
	$list = explode(PHP_EOL, $result); // format ls return into array
	$fullpathlist = array();
	$i = 0;
	echo 'You searched for <i>'.$search.' on '.$platform.'<br>Results:<br><i>(scroll for more)</i><br><br></div>';
	while ($i < sizeof($list)) {
		if (strpos($list[$i], ".srm") !== false) {
			unset($list[$i]);
		} else if ($list[$i] == "" || $list[$i] == " " || $list[$i] == "." || $list[$i] == "..") {
			unset($list[$i]);
		} else {
			$fullpathlist[$i] = "/home/pi/RetroPie/roms/".$platform."/".$list[$i];
			$list[$i] = preg_replace('/\..*/i', '', $list[$i]);
			echo $list[$i]." -- <a href='/controls.php?action=start&system=".$platform."&rom=";
			echo $fullpathlist[$i];
			echo "'>Start game</a><br><br>";
		}
		$i = $i + 1;
	}
}
?>
</body>
</html>
