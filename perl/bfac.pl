sub valid_factoradic
{
    my $f = shift(@_);
    my $max = substr(reverse(join('', (0..9))), -length($f));

    return ($f <= $max);
}

sub fac2ten
{
    my $x = shift(@_);
    my $n = 0;
    my $f = 1;

    $d = chop($x);
    while (($d = chop($x)) ne "") {
        $n += $d * $f;
        $f *= $f + 1;
    }

    return $n;
}

sub ten2fac_r
{
    my $n = shift(@_);
    my $f = shift(@_);

    if ($n < $f) {
        return ("", $n);
    }

    ($s, $n) = ten2fac_r($n, $f * ($f + 1));

    # good thing we're only dealing with positive integers
    # since int() floors instead of truncs
    $d = int($n / $f);
    $n %= $f;
    $s .= $d;

    return ($s, $n);
}

sub ten2fac
{
    my $n = shift(@_);

    ($f, $n) = ten2fac_r($n, 1);

    return $f . "0";
}
