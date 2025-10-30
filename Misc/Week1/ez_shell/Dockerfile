FROM alpine:latest

RUN apk update && apk add openssh sudo bash \
    && chmod u+s /bin/su

RUN rm -f /usr/bin/wget /usr/bin/telnet /usr/bin/nc /usr/bin/ftp /usr/bin/tftp /usr/bin/curl

RUN ssh-keygen -A

RUN adduser -D -s /bin/bash hacker

RUN echo "hacker:h@cker_it" | chpasswd

RUN echo "root:Y0u_@re_root" | chpasswd

RUN echo 'hacker ALL=(ALL) NOPASSWD: ALL' >> /etc/sudoers
RUN mkdir -p /home/hacker/.mysecret \
    && echo "It_is_funny_right?" > /home/hacker/.mysecret/flag1.txt

RUN mkdir -p /root \
    && echo "You_hacked_me!!!" > /root/flag2.txt

RUN chown -R root:root /root && chmod -R 700 /root

RUN sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config \
    && sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin no/' /etc/ssh/sshd_config \
    && sed -i 's/UsePAM yes/UsePAM no/' /etc/ssh/sshd_config

EXPOSE 22

CMD ["/usr/sbin/sshd","-D"]