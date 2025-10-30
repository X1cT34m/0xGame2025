from string import digits, ascii_letters, punctuation, ascii_lowercase
from itertools import product
from tqdm import tqdm

key = "QAQ(@.@)"
alphabet = digits + ascii_letters + punctuation


def vigenere_decrypt(ciphertext, key):
    plaintext = []
    key_index = 0
    for i in ciphertext:
        tmp = []
        bias = alphabet.index(key[key_index])
        new_index = alphabet.index(i)
        for char_index in range(len(alphabet)):
            if ((char_index + bias) * char_index) % len(alphabet) == new_index:
                tmp.append(alphabet[char_index])
        plaintext.append(tmp)
        key_index = (key_index + 1) % len(key)
    return plaintext


ciphertext = "0l0CSoYM<c;amo_P_"

tmp = vigenere_decrypt(ciphertext, key)
total_num = 1
for i in tmp:
    total_num *= len(i)
print(f"Total number of combinations: {total_num}")

for i in product(*tmp):
    flag = ''.join(i)
    if flag.startswith("0xGame{") and flag.endswith("}") and set(flag[7:-1]) < set(ascii_lowercase):
        print(flag)
