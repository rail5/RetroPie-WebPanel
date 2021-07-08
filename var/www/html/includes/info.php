Now playing: <i><?php
$nowplaying = file_get_contents('/home/pi/.gamelogs/nowplaying.txt');
echo $nowplaying;
?></i><br> Last played: <i><?php
$lastplayed = file_get_contents('/home/pi/.gamelogs/lastplayed.txt');
echo $lastplayed;
?></i>
