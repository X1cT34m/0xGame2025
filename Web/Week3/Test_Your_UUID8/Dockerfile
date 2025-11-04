FROM python:3.12-slim

WORKDIR /app

RUN pip install --no-cache-dir flask

COPY . /app
USER root
ENV FLAG=0xGame{Only_Python14&15_UUID8}

RUN useradd -m -u 1000 appuser
USER appuser

EXPOSE 9000
CMD ["python", "app.py"]