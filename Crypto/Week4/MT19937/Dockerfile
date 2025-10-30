ARG PYTHON_VERSION=3.10.11
FROM python:${PYTHON_VERSION}-slim AS base
# RUN pip install -i https://mirrors.tuna.tsinghua.edu.cn/pypi/web/simple pycryptodome

WORKDIR /srv/app
COPY start.sh /srv/app/
COPY task.py /srv/app/
COPY secret.py /srv/app/
RUN find /srv/app -type f -exec sed -i 's/\r//' {} \;
# RUN sed -i 's/\r//' /srv/app/task.py
# RUN chmod 777 /srv/app/task.py

RUN apt-get update && \
    apt-get install -y socat && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

EXPOSE 9999

CMD ["/srv/app/start.sh"]