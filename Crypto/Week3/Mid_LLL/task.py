import random
from secret import flag
from sympy import Matrix
from Crypto.Util.number import *


msg = [i for i in flag]


def generate_matrix(n, p):
    matrix = []
    for _ in range(n):
        row = [random.randint(0, p) for _ in range(n)]
        matrix.append(row)
    return matrix


matrix = generate_matrix(len(msg), 2**128)
matrix[0] = msg
matrix = Matrix(matrix)

noise = Matrix(generate_matrix(len(msg), 2**128))

with open("./output.txt", "w") as f:
    f.write(str((noise * matrix).tolist()))
