<!DOCTYPE html>
<html>
<head><title>TTS</title>
</head>
<body>
<div align="center">
<form action="/includes/speak.php" method="post">
<input type="text" name="tospeak" id="tospeak" placeholder="Write something to say!">
<input type="submit" value="Speak">
</form>
<br><br>
<?php
if (isset($_POST["tospeak"])) {

	$tospeak = $_POST["tospeak"];

	$tospeak = escapeshellarg($tospeak);

	$result = shell_exec("espeak ".$tospeak." --stdout | aplay");
}
?>
</body>
</html>
