from utils import Curve
from secret import flag
import random
from Crypto.Cipher import AES
from hashlib import sha256

pad = lambda msg: msg + bytes([16 - len(msg) % 16] * (16 - len(msg) % 16))

p = 0xffffffff00000001000000000000000000000000ffffffffffffffffffffffff
a = 0xffffffff00000001000000000000000000000000fffffffffffffffffffffffc
b = 0x5ac635d8aa3a93e7b3ebbd55769886bc651d06b0cc53b0f63bce3c3e27d2604b

C = Curve(a, b, p)

s = random.randint(1, 2**40)
P = C.get_random_point()
Q = s * P

assert P.y**2 % p == (P.x**3 + a * P.x + b) % p
assert Q.y**2 % p == (Q.x**3 + a * Q.x + b) % p

print(f"P = {P}")
print(f"Q = {Q}")

key = sha256(str(s).encode()).digest()
cipher = AES.new(key, AES.MODE_ECB)
ciphertext = cipher.encrypt(pad(flag))
print(f"ciphertext = {ciphertext}")

# P = (96072097493962089165616681758527365503518618338657020069385515845050052711198, 106207812376588552122608666685749118279489006020794136421111385490430195590894)
# Q = (100307267283773399335731485631028019332040775774395440323669585624446229655081, 22957963484284064705317349990185223707693957911321089428005116099172185773154)
# ciphertext = b':\xe5^\xd2s\x92kX\x96\x12\xb7dT\x1am\x94\x86\xcd.\x84*-\x93\xb5\x14\x8d\x99\x94\x92\xfaCE\xbd\x01&?\xe1\x01f\xef\x8f\xe3\x13\x13\x96\xa6\x0f\xc0'
