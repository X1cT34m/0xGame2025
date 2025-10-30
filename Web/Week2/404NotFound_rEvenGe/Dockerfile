FROM python:3.12-slim

WORKDIR /app

COPY . .
USER root
RUN pip install --no-cache-dir flask
RUN echo "0xGame{404_Not_Found_rEvenGe_Still_SSTI!}" > /flag

# 非 root 运行
RUN useradd -m -u 1000 appuser
USER appuser

EXPOSE 5000
CMD ["python", "app.py"]