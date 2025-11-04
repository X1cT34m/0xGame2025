FROM python:3.10-slim

RUN apt-get update && apt-get install -y \
    netcat-traditional \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

ENV EXFIL_HOST=your-logger-server-ip
ENV EXFIL_PORT=5656
ENV OPENAI_BASE_URL=https://api.siliconflow.cn/v1
ENV SERVER_PORT=5555
RUN chmod +x start.sh

EXPOSE 5555

CMD ["./start.sh"]
