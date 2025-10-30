from itertools import product
from Crypto.Util.number import *
from ast import literal_eval
from pwn import *

context(log_level='debug')

addr = "nc1.ctfplus.cn 26948".split()
# io = process(["python", "./Ez_LCG/task.py"])
io = remote(addr[0], int(addr[1]))

io.recvuntil(b"Generated coefficients: ")
coefficients = literal_eval(io.recvline().strip().decode())

MOD = 2**20
f = lambda x: sum(c * (x ** i) for i, c in enumerate(coefficients)) % MOD


def list_ring(x0):
    lis = [x0]
    while len(lis) <= 3:
        x = f(lis[-1])
        if x in lis:
            return lis
        else:
            lis.append(x)


for i in range(MOD):
    lis = list_ring(i)
    if lis:
        print(lis)
        print(len(lis))
        break

io.recvuntil(b"Set seed for RNG: ")
io.sendline(str(lis[0]).encode())

io.recvuntil(b"Encrypted flag: ")
encs = literal_eval(io.recvline().strip().decode())


def decrypt(a, b, encs):
    MOD = 2**32 + 1
    flag = ""
    for enc in encs:
        state = enc
        count = 0
        while state >= 2**10 and count <= 1024:
            state = (state - b) * pow(a, -1, MOD) % MOD
            count += 1
        if state > 256:
            return None
        flag += chr(state)
    return flag


for a, b in product(lis, lis):
    flag = decrypt(a, b, encs)
    if flag:
        print(f"0xGame{{{flag}}}")

io.close()
