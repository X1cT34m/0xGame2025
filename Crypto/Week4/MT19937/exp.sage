# Reference: https://seandictionary.top/mt19937/

__import__('os').environ['TERM'] = 'xterm'

from pwn import *
from random import Random
from tqdm import trange

# context(log_level = 'debug')

io = process(['python', 'task.py'])

output = []
for i in range(19968//2):
    io.sendlineafter(b'>> ', b'G')
    output += [int(io.recvline().strip())]

# ---------------------------

def construct_a_row(RNG):
    row = []
    for _ in range(19968//2):
        bits = RNG.getrandbits(2)
        row += list(map(int, bin(bits)[2:].zfill(2)))
    return row
 
T = []
for i in trange(19968):
    state = [0]*624
    temp = "0"*i + "1"*1 + "0"*(19968-1-i)
    for j in range(624):
        state[j] = int(temp[32*j:32*j+32], 2)
 
    RNG = Random()
    RNG.setstate((3,tuple(state+[624]),None))
    T.append(construct_a_row(RNG))
 
T = Matrix(GF(2),T)
b = [int(j) for i in output for j in bin(i)[2:].zfill(2)]
assert len(b) == 19968
B = vector(GF(2),b)
s = T.solve_left(B)
 
state = []
for i in range(624):
    state.append(int("".join(list(map(str,s)))[32*i:32*i+32],2))

# ---------------------------

def _int32(x):
    return int(0xFFFFFFFF & x)


def _re_init_by_array_part(index, mt, multiplier):
    return _int32((mt[index] + index) ^^ (mt[index - 1] ^^ mt[index - 1] >> 30) * multiplier)


def _init_genrand(seed, mt):
    mt[0] = seed
    for i in range(1, 624):
        mt[i] = _int32(1812433253 * (mt[i - 1] ^^ mt[i - 1] >> 30) + i)


def re_init_by_array(mt):
    tmp = [_re_init_by_array_part(i, mt[:-1], 1566083941) for i in [622, 623]]

    original_mt = [0] * 624
    _init_genrand(19650218, original_mt)

    predict_seed = _int32(tmp[-1] - _int32((tmp[-2] ^^ (tmp[-2] >> 30)) * 1664525 ^^ original_mt[-1]))
    return predict_seed

mt = state+[624]
seed = re_init_by_array(mt)
print(seed)

io.sendlineafter(b'>> ', b'C')
io.sendlineafter(b'Guess the seed: ', str(seed).encode())


io.interactive()