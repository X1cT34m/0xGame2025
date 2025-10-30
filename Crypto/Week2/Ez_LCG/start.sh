#!/bin/bash
# start.sh

# 防止信号被传递到子进程
trap '' INT TERM

# 启动Python服务
socat TCP-LISTEN:9999,reuseaddr,fork EXEC:"python task.py"
