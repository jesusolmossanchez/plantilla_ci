#!/bin/bash
set -e
service mysql start
mysql < /mysql/setup.sql
echo "trololo"
service mysql stop
