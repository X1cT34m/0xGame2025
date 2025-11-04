FROM golang:1.21 AS builder

COPY ./readflag.go /app/readflag.go

WORKDIR /app

RUN go build readflag.go

FROM openjdk:8u212-jdk-slim

COPY ./src /app

COPY --from=builder /app/readflag /readflag

WORKDIR /app

RUN echo 0xGame{test} > /flag && \
    groupadd -r app && \
    useradd -r -g app app && \
    chmod 400 /flag && \
    chmod 4755 /readflag

USER app

EXPOSE 8000

CMD java -jar SpringShiro.jar