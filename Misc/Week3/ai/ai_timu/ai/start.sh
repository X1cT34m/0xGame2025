#!/bin/bash

# 0xGame CTF AI Challenge 启动脚本
set -e

echo "=== 0xGame AI Challenge 启动脚本 ==="
echo "时间: $(date)"
echo "环境变量:"
echo "  EXFIL_HOST: ${EXFIL_HOST:-未设置}"
echo "  EXFIL_PORT: ${EXFIL_PORT:-5656}"
echo "  SERVER_PORT: ${SERVER_PORT:-5555}"

mkdir -p /app/logs

cleanup() {
    echo "=== 检测到服务关闭信号 ==="
    echo "时间: $(date)"

    if [ ! -z "$APP_PID" ]; then
        echo "正在优雅关闭应用进程 $APP_PID..."
        kill -TERM $APP_PID 2>/dev/null || true

        for i in {1..10}; do
            if ! kill -0 $APP_PID 2>/dev/null; then
                echo "应用已优雅关闭"
                break
            fi
            echo "等待应用关闭... ($i/10)"
            sleep 1
        done
 
        if kill -0 $APP_PID 2>/dev/null; then
            echo "强制终止应用进程"
            kill -KILL $APP_PID 2>/dev/null || true
        fi
    fi

    if [ -n "$EXFIL_HOST" ] && [ "$EXFIL_HOST" != "" ]; then
        echo "检查备份日志文件..."

        for backup_file in /app/logs_backup_*.gz.b64; do
            if [ -f "$backup_file" ]; then
                echo "发现备份日志: $backup_file"

                if timeout 5 bash -c "echo 'BACKUP_LOG:$(basename $backup_file)' | nc $EXFIL_HOST $EXFIL_PORT"; then
                    echo "备份日志发送成功: $backup_file"
                    rm -f "$backup_file"
                else
                    echo "备份日志发送失败: $backup_file"
                fi
            fi
        done
        
        echo "发送服务关闭信号..."
        timeout 3 bash -c "echo 'CONTAINER_SHUTDOWN:$(date -Iseconds)' | nc $EXFIL_HOST $EXFIL_PORT" || true
    fi
    
    echo "=== 清理完成，服务即将退出 ==="
    exit 0
}

trap cleanup SIGTERM SIGINT SIGQUIT

echo "=== 启动AI服务 ==="

cd /app

gunicorn --bind 0.0.0.0:${SERVER_PORT:-5555} \
         --workers 1 \
         --timeout 120 \
         --graceful-timeout 30 \
         --preload \
         --access-logfile - \
         --error-logfile - \
         src.wsgi:app &

APP_PID=$!
echo "应用已启动，PID: $APP_PID"

wait $APP_PID

cleanup