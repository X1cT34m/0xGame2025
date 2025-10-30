FROM python:3.12-slim

WORKDIR /app

# 安装依赖
RUN pip install --no-cache-dir bottle

# 复制源码
COPY app.py .
COPY ./static /app/static
USER root
RUN echo "0xGame{Bottle_is_an_Amazing_Framework!}" > /flag

# 非 root 运行
RUN useradd -m -u 1000 appuser
USER appuser

EXPOSE 9000
CMD ["python", "app.py"]