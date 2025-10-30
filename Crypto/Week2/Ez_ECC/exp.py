from utils import Curve
from math import *
from tqdm import *
from Crypto.Cipher import AES
from hashlib import sha256

p = 0xffffffff00000001000000000000000000000000ffffffffffffffffffffffff
a = 0xffffffff00000001000000000000000000000000fffffffffffffffffffffffc
b = 0x5ac635d8aa3a93e7b3ebbd55769886bc651d06b0cc53b0f63bce3c3e27d2604b

C = Curve(a, b, p)

P = C(96072097493962089165616681758527365503518618338657020069385515845050052711198, 106207812376588552122608666685749118279489006020794136421111385490430195590894)
Q = C(100307267283773399335731485631028019332040775774395440323669585624446229655081, 22957963484284064705317349990185223707693957911321089428005116099172185773154)
ciphertext = b':\xe5^\xd2s\x92kX\x96\x12\xb7dT\x1am\x94\x86\xcd.\x84*-\x93\xb5\x14\x8d\x99\x94\x92\xfaCE\xbd\x01&?\xe1\x01f\xef\x8f\xe3\x13\x13\x96\xa6\x0f\xc0'

def bsgs(G, P):
    tmp = ceil(sqrt(2**40))
    bs = {}
    for b in trange(tmp):
        bs[str(P - b * G)] = b
    tmp1 = G * tmp
    for a in trange(tmp):
        if str(tmp1 * a) in bs:
            return a * tmp + bs[str(tmp1 * a)]


s = bsgs(P, Q)
print(s)

key = sha256(str(s).encode()).digest()
cipher = AES.new(key, AES.MODE_ECB)
flag = cipher.decrypt(ciphertext)
print(flag)
