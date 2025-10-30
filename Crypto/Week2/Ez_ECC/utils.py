# Weierstrass Curve
import random


def AMM2(x, p):
    s = p - 1
    t = 0
    while s % 2 == 0:
        t += 1
        s //= 2
    while True:
        if pow(y := random.randint(1, p - 1), (p - 1) // 2, p) != 1:
            break
    tmp1 = p - 1
    tmp2 = 0
    for _ in range(t):
        tmp1, tmp2 = map(lambda x: x // 2, [tmp1, tmp2])
        if pow(x, tmp1, p) * pow(y, tmp2, p) % p != 1:
            tmp2 += (p - 1) // 2
    ans = pow(x, (tmp1 + 1) // 2, p) * pow(y, tmp2 // 2, p) % p
    return [ans, p - ans]


class Curve:
    def __init__(self, a: int, b: int, p: int):
        self.a = a
        self.b = b
        self.p = p
        self.O = Point(self)

    def __call__(self, *coords: int) -> "Point":
        return Point(self, *coords)

    def _get_y(self, x):
        y_squared = (x * x * x + self.a * x + self.b) % self.p
        assert pow(y_squared, (self.p - 1) // 2, self.p) == 1, ValueError("Invalid x")
        return AMM2(y_squared, self.p)

    def get_random_point(self) -> "Point":
        while True:
            x = random.randint(0, self.p)
            try:
                y = self._get_y(x)[0]
            except AssertionError:
                continue
            point = self(x, y)
            assert point._check()
            return point

    def __eq__(self, other):
        if not isinstance(other, Curve):
            return NotImplemented
        return (self.a, self.b, self.p) == (other.a, other.b, other.p)


class Point:
    def __init__(self, curve: Curve, *coords: int):
        if len(coords) == 1 and isinstance(coords[0], int):
            self.x = coords[0]
            self.y = curve._get_y(self.x)[0]
        elif len(coords) == 2 and all(isinstance(c, int) for c in coords):
            self.x, self.y = coords
        elif len(coords) == 0:
            self.x, self.y = 0, 0
        else:
            raise ValueError("Invalid coordinates")
        self.curve = curve
        self._check()

    def __repr__(self) -> str:
        return f"({self.x}, {self.y})"

    def __str__(self) -> str:
        return f"({self.x}, {self.y})"

    def __iter__(self) -> iter:
        return iter((self.x, self.y))

    def __add__(self, other: "Point") -> "Point":
        if self.curve != other.curve:
            raise ValueError("Points are not on the same curve")
        if self.x == other.x and self.y == other.y:
            tmp = self.double()
            tmp._check()
            return tmp
        else:
            tmp = self.add(other)
            tmp._check()
            return tmp
    
    def __sub__(self, other: "Point") -> "Point":
        if not isinstance(other, Point):
            return NotImplemented
        return self + (-other)

    def _check(self) -> bool:
        if self.x != 0 or self.y != 0:
            if self.y**2 % self.curve.p != (self.x**3 + self.curve.a * self.x + self.curve.b) % self.curve.p:
                raise ValueError(f"Point {self} is not on the curve")
        return True

    def double(self) -> "Point":
        if self.y == 0:
            return self.curve.O

        m = (3 * self.x ** 2 + self.curve.a) * pow(2 * self.y, -1, self.curve.p) % self.curve.p
        x = (m * m - 2 * self.x) % self.curve.p
        y = (-self.y + m * (self.x - x)) % self.curve.p
        return Point(self.curve, x, y)

    def add(self, other: "Point") -> "Point":
        if self.x == other.x:
            return self.curve.O
        if self == self.curve.O:
            return other
        if other == self.curve.O:
            return self

        m = (other.y - self.y) * pow(other.x - self.x, -1, self.curve.p) % self.curve.p
        x = (m * m - self.x - other.x) % self.curve.p
        y = (-self.y + m * (self.x - x)) % self.curve.p
        return Point(self.curve, x, y)

    def __mul__(self, k) -> "Point":
        assert isinstance(k, int), TypeError("k must be an integer")
        if k == 0:
            return self.curve.O
        elif k < 0:
            return -self * -k

        result = self.curve.O
        addend = self

        while k:
            if k & 1:
                result += addend
            addend = addend.double()
            k >>= 1

        return result

    def __rmul__(self, k) -> "Point":
        return self * k

    def __neg__(self) -> "Point":
        return Point(self.curve, self.x, -self.y % self.curve.p)

    def __eq__(self, other) -> bool:
        if not isinstance(other, Point):
            return NotImplemented
        return (self.x, self.y, self.curve) == (other.x, other.y, other.curve)
