FROM python:3.12-slim

# 设置工作目录
WORKDIR /app

# 复制要求的文件
#COPY requirements.txt .
COPY  app.py app.py
# 安装依赖
RUN pip install --no-cache-dir flask
RUN apt update
RUN echo "0xGame{DNS_Rebinding_is_Really_Magical}" > /flag

# 设置环境变量
EXPOSE 8000

CMD ["python3","app.py"]