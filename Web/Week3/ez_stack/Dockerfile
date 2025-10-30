FROM python:3.12-slim

WORKDIR /app

COPY app.py /app

RUN pip install --no-cache-dir flask

ENV FLAG=0xGame{StackFrame_Wanna_Escape_Now}

RUN useradd -m -u 1000 appuser
USER appuser

EXPOSE 9000
CMD ["python", "app.py"]