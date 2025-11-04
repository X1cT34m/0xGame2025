FROM debian:bookworm-slim

RUN apt-get update && \
    apt-get install -y openssh-server cron rsync bash procps passwd && \
    rm -rf /var/lib/apt/lists/*

RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin no/g' /etc/ssh/sshd_config

RUN sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/g' /etc/ssh/sshd_config

RUN mkdir -p /run/sshd
RUN ssh-keygen -A

RUN useradd -m -s /bin/bash ctf && \
    echo "ctf:hacker" | chpasswd

RUN printf "hello ,you can be better hacker.\\n The flag is in /root/\\n" > /home/ctf/hello.txt && \
    chown ctf:ctf /home/ctf/hello.txt

COPY flag.txt /root/flag.txt
RUN chmod 0600 /root/flag.txt

COPY custom_hosts /etc/hosts


COPY ctf_backup_job /etc/cron.d/ctf_backup_job
RUN chmod 0644 /etc/cron.d/ctf_backup_job

COPY start.sh /start.sh
RUN chmod +x /start.sh
EXPOSE 22

CMD ["/start.sh"]