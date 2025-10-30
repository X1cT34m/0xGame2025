from secret import flag
from Crypto.Cipher import ARC4, AES
from Crypto.Util.Padding import pad
import os

assert flag.startswith(b"0xGame{") and flag.endswith(b"}")
msg = flag[7:-1]

key = b"This is keyyyyyy"
RC4_key = AES.new(key, AES.MODE_ECB).encrypt(pad(os.urandom(16) + msg, 16))[-16:]
cipher = ARC4.new(RC4_key)
if int.from_bytes(os.urandom(1), "big") % 2 == 0:
    print("I'll give you the ciphertext of the flag:")
    ciphertext = cipher.encrypt(msg)
    print(ciphertext)
else:
    print("I'll give you the ciphertext of the key:")
    ciphertext = cipher.encrypt(key * 5)
    print(ciphertext)

assert len(key * 5) > len(msg)
