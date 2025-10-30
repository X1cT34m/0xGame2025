#!/usr/local/bin/python

from Crypto.Cipher import AES
from secret import flag
import os
from base64 import b64decode, b64encode

def encrypt():
    plaintext = b64decode(input("Enter 48-byte plaintext in Base64: "))
    assert len(plaintext) == 48, "Plaintext must be 48 bytes long."

    cipher = AES.new(key, AES.MODE_CBC, IV)
    ciphertext = cipher.encrypt(plaintext)
    return ciphertext

MENU = """
This is a AES CBC encrypt machine (only for 48-byte plaintext XD).
To get flag, you need to make ciphertext like C-B-C, and make another ciphertext like C-C-B to get the flag.
0. Get IV
1. Encrypt
2. Get flag
"""

print(MENU)
key = os.urandom(16)
IV = os.urandom(16)
while True:
    try:
        choice = input("Your option: ")
        if choice == '0':
            print(f"IV in Base64: {b64encode(IV).decode()}")

        elif choice == '1':
            ciphertext = encrypt()

            print(f"Ciphertext in Base64: {b64encode(ciphertext).decode()}")

        elif choice == '2':
            print("Make C-B-C ciphertext.")
            ciphertext = encrypt()
            C, B, C_ = ciphertext[:16], ciphertext[16:32], ciphertext[32:48]
            if C == C_ and C != B:
                print("Make C-C-B ciphertext.")
                ciphertext = encrypt()
                if ciphertext[:16] == ciphertext[16:32] == C and ciphertext[32:48] == B:
                    print("Congratulations! It's your flag!")
                    print(f"Flag: {flag}")
                    break
            print("Invalid ciphertext format.")

        else:
            print("Invalid choice. Please try again.")
    except Exception as e:
        print(f"Error: {e}")