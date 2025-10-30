FROM python:3.12-slim-bookworm

WORKDIR /app

ENV FLAG=0xGame{Detroit:Become_Cake}
ENV MODEL_AGGREGATION_THRESHOLD=3

COPY requirements.txt .

RUN pip install torch torchvision torchaudio --index-url https://download.pytorch.org/whl/cpu

RUN pip install --no-cache-dir -r requirements.txt

COPY . .

EXPOSE 8080
CMD ["python", "app.py"]