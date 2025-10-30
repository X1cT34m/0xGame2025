from secret import flag
from utils import AES
import os

MENU = """
AES Machine
[E]ncrypt
[G]et Encrypted Flag
"""


def pad(msg): return msg + bytes([16 - len(msg) % 16] * (16 - len(msg) % 16))


print(MENU)
key = os.urandom(16)
cipher = AES(key, rounds=4)
enc = cipher.encrypt(pad(flag.encode()))
while True:
    try:
        choice = input("Choice: ").strip().upper()
        if choice == 'E':
            plaintext = input("Plaintext (hex): ").strip()
            try:
                plaintext_bytes = bytes.fromhex(plaintext)
                if len(plaintext_bytes) % 16 != 0:
                    print("Plaintext length must be a multiple of 16 bytes.")
                    continue
                ciphertext = cipher.encrypt(plaintext_bytes)
                print("Ciphertext (hex):", ciphertext.hex())
            except ValueError:
                print("Invalid hex input.")
        elif choice == 'G':
            print("Encrypted Flag (hex):", enc.hex())
    except Exception as e:
        print("Error:", str(e))