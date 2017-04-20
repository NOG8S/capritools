#!/usr/bin/env bash
mysql -u root -e "CREATE DATABASE IF NOT EXISTS sde"

function import {
	mysql -u root sde -e "drop table IF EXISTS $1"

	mysql -u root sde < /tmp/capritools/install/sde/$1.sql
}

mkdir -p sde

import "mapSolarSystems"
import "mapConstellations"
import "mapRegions"
import "invGroups"
import "invTypes"