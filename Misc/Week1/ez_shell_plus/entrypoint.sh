#!/bin/bash

set -e
echo "--- Starting Challenge Environment Setup ---"

CHALLENGE_DIR="/home/welcome/challenge"
FILES_DIR="$CHALLENGE_DIR/files"
KEY_FILE="/etc/secret_key.backup"
mkdir -p "$FILES_DIR"

printf "%s" "$(openssl rand -hex 16)" > "$KEY_FILE"

echo "Generating 100 junk files..."
for i in {1..100}; do
    head -c $(( ( RANDOM % 101 ) + 50 )) /dev/urandom | base64 > "$FILES_DIR/$(openssl rand -hex 8).dat"
done

FLAG_FILE_NAME=$(openssl rand -hex 8).dat
FLAG_FILE_PATH="$FILES_DIR/$FLAG_FILE_NAME"
echo "Creating encrypted flag..."
printf "%s" "0xGame{Welc0me_to_H@ckers_w0r1d}" | \
openssl enc -aes-256-cbc -salt -pbkdf2 -pass file:"$KEY_FILE" | \
base64 > "$FLAG_FILE_PATH"

sha256sum "$FLAG_FILE_PATH" | cut -d' ' -f1 > "$CHALLENGE_DIR/hash_value"

echo '#!/bin/bash
if [ "$#" -ne 1 ]; then echo "Usage: ./decrypt.sh [file]"; exit 1; fi
KEY_FILE="/etc/secret_key.backup"
if [ ! -f "$KEY_FILE" ]; then echo "Key missing!"; exit 1; fi

base64 -d "$1" 2>/dev/null | openssl enc -d -aes-256-cbc -pbkdf2 -pass file:$KEY_FILE; echo
' > "$CHALLENGE_DIR/decrypt.sh"

echo "Setting file permissions..."
chown -R root:welcome "$CHALLENGE_DIR"
chmod 750 "$CHALLENGE_DIR"
chmod 640 "$CHALLENGE_DIR/hash_value"
chmod 750 "$FILES_DIR"
chmod 640 "$FILES_DIR"/*
chmod 750 "$CHALLENGE_DIR/decrypt.sh"
chown root:welcome "$KEY_FILE"
chmod 440 "$KEY_FILE"

mkdir -p /run/sshd
echo "--- Setup complete. Starting SSH daemon. ---"
echo "Erasing setup script..."
rm -- "$0"
exec "$@"