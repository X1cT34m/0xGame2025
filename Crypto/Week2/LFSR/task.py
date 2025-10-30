import random
from Crypto.Util.Padding import pad
from Crypto.Cipher import AES
from secret import flag


class LFSR:
    def __init__(self, Mask_seed=None, Length=128):
        self.Length = Length if Mask_seed is None else Mask_seed.bit_length()
        assert Mask_seed.bit_length() < self.Length + 1
        self.seed = random.getrandbits(self.Length)
        self.state = self.init_state(self.seed)
        self.mask = self.init_state(Mask_seed if Mask_seed is not None else random.getrandbits(self.Length))

    def init_state(self, seed):
        result = [int(i) for i in bin(seed)[2:]]
        PadLenth = self.Length - len(result)
        result = [0] * PadLenth + result
        assert len(result) == self.Length
        return result

    def next(self):
        output = 0
        for i in range(self.Length):
            output ^= self.state[i] & self.mask[i]
        self.state = self.state[1:] + [output]
        return output

    def getrandbits(self, Length):
        result = []
        for _ in range(Length):
            result.append(str(self.next()))
        return int(''.join(result), 2)


mask = random.getrandbits(128)
lfsr = LFSR(mask)
print(f"random1 = {lfsr.getrandbits(128)}")
print(f"random2 = {lfsr.getrandbits(128)}")

cipher = AES.new(mask.to_bytes(16, 'big'), AES.MODE_ECB)
ciphertext = cipher.encrypt(pad(flag, 16))
print(f"ciphertext = {ciphertext}")

# random1 = 79262982171792651683253726993186021794
# random2 = 121389030069245976625592065270667430301
# ciphertext = b'\xb9WE<\x8bC\xab\x92J7\xa9\xe6\xe8\xd8\x93D\xcc\xac\xfdvfZ}C\xe6\xd8;\xf7\x18\xbauz`\xb9\xe0\xe6\xc6\xae\x00\xfb\x96%;k{Ph\xfa'
