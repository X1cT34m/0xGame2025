from pwn import *
from base64 import b64decode, b64encode

# context(log_level='debug')

addr = "nc1.ctfplus.cn 22385".split()
io = remote(addr[0], int(addr[1]))


def xor(a, b): return bytes([x ^ y for x, y in zip(a, b)])


io.recvuntil("Your option: ")
io.sendline("0")
io.recvuntil("IV in Base64: ")
IV = b64decode(io.recvline().strip())

io.recvuntil("Your option: ")
io.sendline("1")
io.recvuntil("plaintext in Base64: ")
msg = b64encode(b"1" * 48)
io.sendline(msg)
io.recvuntil("Ciphertext in Base64: ")
ciphertext = b64decode(io.recvline().strip())

msg1 = b64encode(b"1" * 32 + xor(ciphertext[16:32], xor(IV, b"1" * 16)))
msg2 = b64encode(b"1" * 16 + xor(ciphertext[:16], xor(IV, b"1" * 16)) + b"1" * 16)
io.recvuntil("Your option: ")
io.sendline("2")
io.recvuntil("plaintext in Base64: ")
io.sendline(msg1)
io.recvuntil("plaintext in Base64: ")
io.sendline(msg2)

io.interactive()
