#!/usr/bin/env bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

function download {
	wget https://www.fuzzwork.co.uk/dump/latest/$1.sql.bz2 -O ${DIR}/sde/$1.sql.bz2
	pbzip2 -df ${DIR}/sde/$1.sql.bz2
}

mkdir -p ${DIR}/sde

download "mapSolarSystems"
download "mapConstellations"
download "mapRegions"
download "invGroups"
download "invTypes"