__import__('os').environ['TERM'] = 'xterm'

from pwn import *
from Crypto.Util.number import *

# context(log_level = 'debug')

# io = remote("121.40.28.126", 5000)

io.recvuntil(b">> ")
io.sendline(b"1")

io.recvuntil(b"c = ")
c = int(io.recvline().strip())
print(f"c = {c}")
io.recvuntil(b"p = ")
p = int(io.recvline().strip())
print(f"p = {p}")
io.recvuntil(b"q = ")
q = int(io.recvline().strip())
print(f"q = {q}")

n = p * q
phi = (p - 1) * (q - 1)
F = Zmod(n)

io.recvuntil(b">> ")
io.sendline(b"2")

io.recvuntil(b"Enter your number: ")
io.sendline(b"2")
io.recvuntil(b"Encrypted number: ")
cc = int(io.recvline().strip())

e = discrete_log(F(cc), F(2), ord=phi)
print(f"e = {e}")

d = inverse_mod(e, phi)
m = pow(c, d, n)
flag = long_to_bytes(m)
print(flag)