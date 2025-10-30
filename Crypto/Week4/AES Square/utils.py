class AES():
    Rcon = [0x01, 0x02, 0x04, 0x08, 0x10, 0x20, 0x40, 0x80, 0x1B, 0x36]

    def __init__(self, key: bytes, rounds: int = 10):
        self.rounds = rounds
        self.key = key
        self.S = self._generate_sbox()
        self.S_inv = self._generate_sinvbox()
        self.W = [list(key[i:i + 4]) for i in range(0, 16, 4)]
        self._key_expansion()

    def _xor(self, a, b=None):
        if b is None:
            assert len(a) > 0
            return a[0] ^ self._xor(a[1:]) if len(a) > 1 else a[0]
        assert len(a) == len(b)
        return [x ^ y for x, y in zip(a, b)]

    def _gmul(self, a, b):
        p = 0
        while b:
            if b & 1:
                p ^= a
            a = a << 1
            if a >> 8:
                a ^= 0b100011011
            b >>= 1
        return p

    def _multiply(self, a, b):
        return self._xor([self._gmul(x, y) for x, y in zip(a, b)])

    def _matrix_multiply(self, const, state):
        return [[self._multiply(const[i], [state[k][j] for k in range(4)]) for j in range(4)] for i in range(4)]

    def _permutation(self, lis, table):
        return [table[i] for i in lis]

    def _block_permutation(self, block, table):
        return [self._permutation(row, table) for row in block]

    def _left_shift(self, block, n):
        return block[n:] + block[:n]

    def _bytes_to_matrix(self, text: bytes) -> list[list[int]]:
        return [[text[j * 4 + i] for j in range(4)] for i in range(4)]

    def _matrix_to_bytes(self, block: list[list[int]]) -> bytes:
        return bytes([block[j][i] for i in range(4) for j in range(4)])

    def _T(self, w: list[int], n) -> list[int]:
        w = self._left_shift(w, 1)
        w = self._permutation(w, self.S)
        w[0] ^= self.Rcon[n]
        return w

    def _generate_sbox(self):
        S = [0x63] + [0] * 255
        r = lambda x, s: (x << s | x >> 8 - s) % 256
        p, q = 1, 1
        for _ in range(255):
            p = (p ^ (p * 2) ^ [27, 0][p < 128]) % 256
            q ^= q * 2
            q ^= q * 4
            q ^= q * 16
            q &= 255
            q ^= [9, 0][q < 128]
            S[p] = q ^ r(q, 1) ^ r(q, 2) ^ r(q, 3) ^ r(q, 4) ^ 99
        return S

    def _generate_sinvbox(self):
        S_inv = [0] * 256
        for i in range(256):
            S_inv[self.S[i]] = i
        return S_inv

    def _key_expansion(self):
        for i in range(4, (self.rounds + 1) * 4):
            if i % 4 == 0:
                self.W.append(self._xor(self.W[i - 4], self._T(self.W[i - 1], i // 4 - 1)))
            else:
                self.W.append(self._xor(self.W[i - 4], self.W[i - 1]))

    def _row_shift(self, block: list[list[int]]) -> list[list[int]]:
        return [self._left_shift(block[i], i) for i in range(4)]

    def _column_mix(self, block: list[list[int]]) -> list[list[int]]:
        return self._matrix_multiply([self._left_shift([2, 3, 1, 1], 4 - i) for i in range(4)], block)

    def _round_key_add(self, block: list[list[int]], key: list[list[int]]) -> list[list[int]]:
        return [self._xor(block[i], [key[j][i] for j in range(4)]) for i in range(4)]

    def _encrypt(self, block: list[list[int]]) -> list[list[int]]:
        block = self._round_key_add(block, self.W[:4])
        for i in range(1, self.rounds):
            block = self._block_permutation(block, self.S)
            block = self._row_shift(block)
            block = self._column_mix(block)
            block = self._round_key_add(block, self.W[i * 4:(i + 1) * 4])
        block = self._block_permutation(block, self.S)
        block = self._row_shift(block)
        block = self._round_key_add(block, self.W[-4:])
        return block

    def _inv_row_shift(self, block: list[list[int]]) -> list[list[int]]:
        return [self._left_shift(block[i], 4 - i) for i in range(4)]

    def _inv_column_mix(self, block: list[list[int]]) -> list[list[int]]:
        return self._matrix_multiply([self._left_shift([14, 11, 13, 0x9], 4 - i) for i in range(4)], block)

    def _decrypt(self, block: list[list[int]]) -> list[list[int]]:
        block = self._round_key_add(block, self.W[-4:])
        for i in range(self.rounds - 1, 0, -1):
            block = self._inv_row_shift(block)
            block = self._block_permutation(block, self.S_inv)
            block = self._round_key_add(block, self.W[i * 4:(i + 1) * 4])
            block = self._inv_column_mix(block)
        block = self._inv_row_shift(block)
        block = self._block_permutation(block, self.S_inv)
        block = self._round_key_add(block, self.W[:4])
        return block

    def encrypt(self, plaintext: bytes) -> bytes:
        assert len(plaintext) % 16 == 0, ValueError(f"Incorrect AES plaintext length ({len(plaintext)} bytes)")
        ciphertext = b''
        for i in range(0, len(plaintext), 16):
            block = plaintext[i:i + 16]
            block = self._bytes_to_matrix(block)
            block = self._encrypt(block)
            ciphertext += self._matrix_to_bytes(block)
        return ciphertext

    def decrypt(self, ciphertext: bytes) -> bytes:
        assert len(ciphertext) % 16 == 0, ValueError(f"Incorrect AES ciphertext length ({len(ciphertext)} bytes)")
        plaintext = b''
        for i in range(0, len(ciphertext), 16):
            block = ciphertext[i:i + 16]
            block = self._bytes_to_matrix(block)
            block = self._decrypt(block)
            plaintext += self._matrix_to_bytes(block)
        return plaintext


if __name__ == "__main__":
    # Example usage
    key = b'\x8b%w\xb6+\xf98\xa7DE~\xc8\x90\n\x84\xfe'
    ciphertext = bytes.fromhex("3142b33c4d0bd074a0371160035033b04f6597ef58b23712152cf89789c4386f37a94dc48de09d27420ff90dd3e1c50b")

    aes = AES(key,rounds=4)
    plaintext = aes.decrypt(ciphertext)
    print(plaintext)
