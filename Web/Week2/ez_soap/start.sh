#!/bin/bash

redis-server /etc/redis/redis.conf &

sleep 1

exec apache2-foreground