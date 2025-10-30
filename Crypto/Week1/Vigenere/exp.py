from string import digits, ascii_letters, punctuation

key = "Welcome-2025-0xGame"
alphabet = digits + ascii_letters + punctuation

def vigenere_decrypt(ciphertext, key):
    plaintext = ""
    key_index = 0
    for char in ciphertext:
        bias = alphabet.index(key[key_index])
        char_index = alphabet.index(char)
        new_index = (char_index - bias) % len(alphabet)
        plaintext += alphabet[new_index]
        key_index = (key_index + 1) % len(key)
    return plaintext


ciphertext = r'WL"mKAaequ{q_aY$oz8`wBqLAF_{cku|eYAczt!pmoqAh+'
print(vigenere_decrypt(ciphertext, key))