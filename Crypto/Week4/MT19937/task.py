#!/usr/local/bin/python
from secret import flag
import random
import signal

# signal.alarm(100)

seed = random.randint(0, 2**32 - 1)
RNG = random.Random(seed)

MENU = """
MT19937 Seed Challenge
======================
[G]et random number
[C]heck seed
"""


def challenge():
    while True:
        inputs = input(">> ")
        if inputs.strip().upper() == "G":
            print(RNG.getrandbits(2))
        elif inputs.strip().upper() == "C":
            guess = int(input("Guess the seed: "))
            if guess == seed:
                print(f"Correct! Here is your flag: {flag.decode()}")
            else:
                print("Incorrect seed. Exiting...")
            break
        else:
            print("Invalid option. Please choose G or C.")


if __name__ == "__main__":
    print("Welcome to the MT19937 Seed Challenge!")
    print("A random seed has been generated. You can get random numbers or try to guess the seed.")
    print(MENU)
    challenge()
