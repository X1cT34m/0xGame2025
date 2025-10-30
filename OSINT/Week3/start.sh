#!/bin/bash

# 1. Start Cron server
echo "Starting Cron daemon..."
cron

# 2. Start Flask server
echo "Starting Flask app..."
python3 /app/0xGame/app.py &

# 3. Start Apache server
echo "Starting Apache in foreground..."
exec apache2-foreground