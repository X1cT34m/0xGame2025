from Crypto.Util.number import *
from secret import flag
from hashlib import sha256
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad


p = getPrime(512)
print(f"The Prime is {p}")
g = getRandomRange(2, p)
print(f"The Generator is {g}")
a = getRandomRange(2, p)
A = pow(g, a, p)
print(f"Alice's Public Key is {A}")
B = int(input("Bob's Public Key: "))
assert B != A
s = pow(B, a, p)

key = sha256(long_to_bytes(s)).digest()
cipher = AES.new(key, AES.MODE_ECB)
enc = cipher.encrypt(pad(flag, 16))
print(f"Encrypted Flag: {enc.hex()}")