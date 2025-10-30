from secret import flag
import pyotp
from base64 import b32encode
import qrcode
import os
import time

MENU = """
Login Machine
[R]egister
[L]ogin
[G]et Flag
"""

print(MENU)
logged = False
logged_time = None
while True:
    choice = input("Choice: ").strip().upper()
    if choice == "R":
        username = input("Username: ").strip()
        key = os.urandom(20)
        secret = b32encode(key).decode()

        totp = pyotp.TOTP(secret)
        uri = totp.provisioning_uri(name=username, issuer_name="0xGame2025")

        qr = qrcode.QRCode()
        qr.add_data(uri)
        qr.print_ascii(invert=True)
    elif choice == "L":
        if "secret" not in locals():
            print("Please register first.")
            continue
        token = input("Verification Code: ").strip()
        if pyotp.TOTP(secret).verify(token):
            print("Login successful!")
            logged = True
            logged_time = time.time()
        else:
            print("Code incorrect.")
    elif choice == "G":
        if logged:
            if (time.time() - logged_time) < 10:
                print(flag)
            else:
                print("Out of time(10s). Please login again.")
                logged = False
                logged_time = None
        else:
            print("Please login first.")
    else:
        print("Invalid choice.")
