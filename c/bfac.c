#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MAX_LEN     9

int valid_factoradic(const char *fac)
{
    int d;
    const char *p;

    d = 0;
    p = fac + strlen(fac) - 1;

    for (d = 0, p = fac + strlen(fac) - 1; p >= fac; d++, p--) {
        if ((*p - '0') > d) {
            return 0;
        }
    }

    return 1;
}

int fac2ten(const char *fac)
{
    int n, f, len;
    const char *p;

    len = strlen(fac);
    if (len > MAX_LEN) {
        return -1;
    }

    n = 0;
    f = 1;
    p = fac + len - 2;

    while (p >= fac) {
        n += (*p - '0') * f;
        f *= (f + 1);
        --p;
    }

    return n;
}

static int ten2fac_r(int n, int f, char *fac)
{
    int d;
    char s[2];

    if (n < f) {
        return n;
    }

    n = ten2fac_r(n, f * (f + 1), fac);

    d = n / f;
    n %= f;

    sprintf(s, "%d", d);
    strcat(fac, s);

    return n;
}

char *ten2fac(int n)
{
    static char fac[MAX_LEN+1];

    fac[0] = '\0';
    ten2fac_r(n, 1, fac);
    strcat(fac, "0");

    return fac;
}
