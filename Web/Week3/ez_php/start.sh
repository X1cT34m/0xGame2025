#!/bin/bash
cd /var/www/html/primary
while :
do
    cp -P * /var/www/html/marstream/
    chmod 755 -R /var/www/html/marstream/
    sleep 5s

done &

exec apache2-foreground