#!/bin/bash

mkdir -p /var/run/sshd

/usr/sbin/sshd -D &

/usr/sbin/cron -f