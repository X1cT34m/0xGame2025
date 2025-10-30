# 使用官方 Python 3.12 镜像作为基础镜像
FROM python:3.12-slim

# 设置工作目录
WORKDIR /app

# 将当前目录中的文件复制到容器的工作目录中
COPY . /app

# 安装依赖
RUN pip install --no-cache-dir flask

# 暴露应用运行所需的端口
EXPOSE 5000

# 设置环境变量，指定 Flask 应用的入口文件
ENV FLASK_APP=app.py

# 启动 Flask 应用
CMD ["flask", "run", "--host=0.0.0.0", "--port=5000"]