#!/usr/bin/env bash

mysql -u root -e "CREATE DATABASE IF NOT EXISTS tools"

mysql -u root tools < /tmp/capritools/capritools.sql