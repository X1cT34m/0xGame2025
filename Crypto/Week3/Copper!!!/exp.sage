from Crypto.Util.number import *

n = ...
c = ...
gift = ...

R.<x> = PolynomialRing(Zmod(n))

f = gift + x
res = f.small_roots(X=2^242, beta=0.5, epsilon=0.02)
p = ZZ(res[0] + gift)
q = n // p
assert p * q == n
phi = (p - 1) * (q - 1)
d = inverse_mod(65537, phi)
m = pow(c, d, n)
print(long_to_bytes(m))