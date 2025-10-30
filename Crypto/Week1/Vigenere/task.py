from string import digits, ascii_letters, punctuation
from secret import flag

key = "Welcome-2025-0xGame"
alphabet = digits + ascii_letters + punctuation


def vigenere_encrypt(plaintext, key):
    ciphertext = ""
    key_index = 0
    for char in plaintext:
        bias = alphabet.index(key[key_index])
        char_index = alphabet.index(char)
        new_index = (char_index + bias) % len(alphabet)
        ciphertext += alphabet[new_index]
        key_index = (key_index + 1) % len(key)
    return ciphertext


print(vigenere_encrypt(flag, key))

# WL"mKAaequ{q_aY$oz8`wBqLAF_{cku|eYAczt!pmoqAh+
