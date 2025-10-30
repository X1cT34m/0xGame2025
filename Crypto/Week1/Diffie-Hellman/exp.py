from Crypto.Util.number import *
from hashlib import sha256
from Crypto.Cipher import AES
from pwn import *

context(log_level='debug')

io = remote("nc1.ctfplus.cn", 19228)
# io = process(["python", "./Crypto/Diffie-Hellman/task.py"])

io.recvuntil(b"The Prime is ")
p = int(io.recvline().strip())
io.recvuntil(b"The Generator is ")
g = int(io.recvline().strip())
io.recvuntil(b"Alice's Public Key is ")
A = int(io.recvline().strip())
b = getRandomRange(2, p)
B = pow(g, b, p)
io.recvuntil(b"Bob's Public Key: ")
io.sendline(str(B).encode())
s = pow(A, b, p)
key = sha256(long_to_bytes(s)).digest()
cipher = AES.new(key, AES.MODE_ECB)
io.recvuntil(b"Encrypted Flag: ")
enc = bytes.fromhex(io.recvline().strip().decode())
print(cipher.decrypt(enc))
