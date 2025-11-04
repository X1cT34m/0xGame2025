import base64

def casar_encrypt(text,shift):
    result=""

    for char in text:
        if char.isupper():
            result+=chr((ord(char)+shift-65)%26+65)

        elif char.islower():
            result+=chr((ord(char)+shift-97)%26+97)

        else:
            result+=char
    return result

if __name__ == "__main__":

    caser_encrypt=casar_encrypt("0xGame{Welc0me_t0_0xG4m3_2o25_@nd_h@ck_For_fuN}",114514)

    print(caser_encrypt)

    cipher=base64.b64encode(caser_encrypt.encode("utf-8"))
    print(cipher)

