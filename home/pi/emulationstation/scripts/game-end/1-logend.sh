#!/usr/bin/env bash
cat /home/pi/.gamelogs/nowplaying.txt > /home/pi/.gamelogs/lastplayed.txt
echo "None" > /home/pi/.gamelogs/nowplaying.txt
