#!/usr/local/bin/python
from Crypto.Util.number import *
from secret import flag
import random


class LCG():
    def __init__(self, a, b, m, seed):
        self.a = a
        self.b = b
        self.m = m
        self.state = seed

    def next(self):
        self.state = (self.a * self.state + self.b) % self.m
        return self.state


class RNG():
    def __init__(self, coefficients, seed, MOD=2**20):
        self.coefficients = coefficients
        self.state = seed
        self.f = lambda x: sum(c * (x ** i) for i, c in enumerate(coefficients)) % MOD

    def next(self):
        self.state = self.f(self.state)
        return self.state

    def next_n(self, n):
        for _ in range(n):
            self.next()
        return self.state


def encrypt_flag(flag):
    coefficients = [random.randint(1, 2**20) for _ in range(10)]
    print("Generated coefficients:", coefficients)
    seed = input("Set seed for RNG: ")
    rng = RNG(coefficients, int(seed))
    assert rng.next() != rng.next(), "Weak seed"
    a, b = [rng.next_n(random.randint(1, 1024)) for _ in range(2)]
    encs = []
    for i in flag:
        lcg = LCG(a, b, 2**32 + 1, i)
        for _ in range(random.randint(1, 1024)):
            enc = lcg.next()
        encs.append(enc)
    return encs


assert flag.startswith(b"0xGame{") and flag.endswith(b"}")
flag = flag[7:-1]

print(f"Encrypted flag: {encrypt_flag(flag)}")
