FROM ubuntu:22.04

RUN sed -i 's/archive.ubuntu.com/mirrors.aliyun.com/g' /etc/apt/sources.list && \
    sed -i 's/security.ubuntu.com/mirrors.aliyun.com/g' /etc/apt/sources.list

RUN apt-get update && apt-get install -y python3-pip python3-dev ncat

WORKDIR /app

COPY 2.py /app/

RUN echo "#!/bin/bash\n\npython3 -u 2.py 2>&1" > ./wrapper.sh

RUN chmod -R 555 /app

CMD ncat -klvp 2000 -m 999999 -e ./wrapper.sh