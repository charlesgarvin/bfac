# requires python2.6 due to use of factorial function

from math import factorial

def valid_factoradic(number):
	return True

def ten2fac(bten):
	"""
	Convert a number from base ten to base factorial.

	The result is an actual integer, no subscript attached.
	
	>>> [ten2fac(n) for n in range(24)]
	[0, 10, 100, 110, 200, 210, 1000, 1010, 1100, 1110, 1200, 1210, 2000, 2010, 2100, 2110, 2200, 2210, 3000, 3010, 3100, 3110, 3200, 3210]
	"""

	num = ''

	fac = 0
	while bten >= factorial(fac):
		fac = fac + 1

	if fac > 0:
		fac = fac - 1

	radix = r = fac + 1

	t = bten
	while radix:
		f = factorial(fac)
		digit = t / f
		t = t % f
		fac = fac - 1
		radix = radix - 1

		num = num + str(digit)

	if len(num) < radix:
		num = num + '0'

	return int(num)

def fac2ten(bfac):
	"""
	Convert a number from base factorial to base ten.

	>>> [fac2ten(n) for n in 0, 10, 100, 110, 200, 210, 1000, 1010, 1100, 1110, 1200, 1210, 2000, 2010, 2100, 2110, 2200, 2210, 3000, 3010, 3100, 3110, 3200, 3210]
	[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]
	"""

	if not valid_factoradic(bfac):
		error = 'The number ' + str(bfac) + ' is not a valid factorial number'
		raise TypeError(error)

	num  = 0

	f = str(bfac)

	radix = len(f)

	pos = 0
	while radix > 1:
		radix = radix - 1
		v = int(f[pos])
		n = v * factorial(radix)
		num = num + n
		pos = pos + 1

	return num
