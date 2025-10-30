#!/usr/local/bin/python
from Crypto.Util.number import *
from secret import flag
import random


def getSmoothPrime(bits):
    while True:
        lis = list(sieve_base[:300])
        a = 2
        while a.bit_length() < bits:
            a *= (tmp := random.choice(lis))
            lis.remove(tmp)
        if isPrime(a + 1) and (a + 1).bit_length() == bits:
            return a + 1


MENU = """
It is an RSA encryption machine with random e.
1. Get encrypted flag and p,q
2. Encrypt a number
"""

print("Initializing...")
p = getSmoothPrime(256)
q = getSmoothPrime(256)
n = p * q
e = getPrime(300)
m = bytes_to_long(flag + b"\x00" * (50 - len(flag)))
c = pow(m, e, n)

print(MENU)
while True:
    choice = input(">> ").strip()
    if choice == "1":
        print(f"c = {c}")
        print(f"p = {p}")
        print(f"q = {q}")
    if choice == "2":
        mm = int(input("Enter your number: ").strip())
        cc = pow(mm, e, n)
        print(f"Encrypted number: {cc}")
