# Dockerfile

# 使用轻量级的 Python 镜像作为基础
FROM python:3.10-slim

# 安装 ExifTool。在 Debian/Ubuntu 系的发行版中，通常叫做 libimage-exiftool-perl
RUN apt-get update && \
    apt-get install -y --no-install-recommends libimage-exiftool-perl && \
    rm -rf /var/lib/apt/lists/*

# 设置工作目录
WORKDIR /app

# 复制 Flask 应用代码
COPY app.py /app/

# 安装所需的 Python 库
RUN pip install Flask

# 暴露 Flask 默认端口
EXPOSE 5000

# 运行应用
# 使用Gunicorn或类似的生产级WSGI服务器更稳健，但对于CTF简单起见，直接用Flask内置的即可
CMD ["python", "app.py"]