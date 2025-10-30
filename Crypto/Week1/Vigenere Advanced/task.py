from string import digits, ascii_letters, punctuation, ascii_lowercase
from secret import flag

assert flag.startswith("0xGame{") and flag.endswith("}")
assert set(flag[7:-1]) < set(ascii_lowercase)

key = "QAQ(@.@)"
alphabet = digits + ascii_letters + punctuation


def vigenere_encrypt(plaintext, key):
    ciphertext = ""
    key_index = 0
    for i in plaintext:
        bias = alphabet.index(key[key_index])
        char_index = alphabet.index(i)
        new_index = ((char_index + bias) * char_index) % len(alphabet)
        ciphertext += alphabet[new_index]
        key_index = (key_index + 1) % len(key)
    return ciphertext


print(vigenere_encrypt(flag, key))

# 0l0CSoYM<c;amo_P_
