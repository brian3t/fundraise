#!/bin/bash -v
# Copy a database from local env to remote env
# Save a backup before doing so
localhost=192.168.1.9
dbname=fund
pw="fTrapok)1"
remote_host=fundyay.com
timestamp=$(date +%Y%m%d_%H%M%S)

## First, take a backup from remote
#echo mysqldump -u${dbname} -p"${pw}" ${dbname} -h${remote_host} --no-tablespaces
#echo ${dbname}_${timestamp}.sql.gz
mysqldump -u${dbname} -p"${pw}" ${dbname} -h${remote_host} --no-tablespaces | gzip > ${dbname}_${remote_host}_${timestamp}.sql.gz

## Second, dump raw from local host
mysqldump -u${dbname} -p"${pw}" ${dbname} -h${localhost} --no-tablespaces > ${dbname}_${localhost}_${timestamp}.sql

## Third, restore to remote host
mysql -u${dbname} -p"${pw}" -h${remote_host} ${dbname} < ${dbname}_${localhost}_${timestamp}.sql

## Done
