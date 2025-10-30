from Crypto.Cipher import AES


random1 = 79262982171792651683253726993186021794
random2 = 121389030069245976625592065270667430301
ciphertext = b'\xb9WE<\x8bC\xab\x92J7\xa9\xe6\xe8\xd8\x93D\xcc\xac\xfdvfZ}C\xe6\xd8;\xf7\x18\xbauz`\xb9\xe0\xe6\xc6\xae\x00\xfb\x96%;k{Ph\xfa'

def init(a):
    result = [int(i) for i in bin(a)[2:]]
    PadLenth = 128 - len(result)
    result = [0] * PadLenth + result
    return result

random1 = init(random1)
random2 = init(random2)
state = random1 + random2
A = Matrix(GF(2), [state[i:i+128] for i in range(0, 128)])
b = vector(GF(2), random2)
x = A.solve_right(b)
mask = sum([ZZ(x[i]) << (127 - i) for i in range(128)])
print(x)
print(mask)
cipher = AES.new(int(mask).to_bytes(16, 'big'), AES.MODE_ECB)
plaintext = cipher.decrypt(ciphertext)
print(plaintext)
