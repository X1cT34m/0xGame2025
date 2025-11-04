FROM python:3.12-slim

WORKDIR /app

# 安装依赖
RUN pip install --no-cache-dir flask

# 复制源码
COPY . /app
USER root
ENV flag=0xGame{You_Have_Learned_How_to_Buy_Pickle!!}
# 非 root 运行
RUN useradd -m -u 1000 appuser
USER appuser

EXPOSE 9000
CMD ["python", "app.py"]