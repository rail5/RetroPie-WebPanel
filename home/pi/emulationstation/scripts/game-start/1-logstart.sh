#!/usr/bin/env bash
console=$1
console=${console#/home/pi/RetroPie/roms/}
console=${console%/*}
console=${console^^}

output="$2 ($console)"

echo $output > /home/pi/.gamelogs/nowplaying.txt
