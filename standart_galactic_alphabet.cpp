#include <iostream>
#include <fcntl.h>
#include <io.h>
#include <stdio.h>
using namespace std;
int main()
{
 _setmode(_fileno(stdout), _O_U16TEXT);
 wprintf(L"test\n");//standard galactic alphabet
 // https://unicode-table.com/en/''liczba''/        \\liczba = \x'liczba'
wstring a = L"\u1511 ";
wstring b = L"\u0296 ";
wstring c = L"\u14F5 ";
wstring d = L"\u21B8 ";
wstring e = L"\u14B7 ";
wstring f = L"\u2393 ";
wstring g = L"\u22A3 ";
wstring h = L"\u2351 ";
wstring i = L"\u254E ";
wstring j = L"\u22EE ";
wstring k = L"\uA58C ";
wstring l = L"\uA58E ";
wstring m = L"\u14B2 ";
wstring n = L"\u30EA ";
wstring o = L"\u30D5 ";
wstring p = L"¡! ";
wstring q = L"\u1451 ";
wstring r = L"\u2237 ";
wstring s = L"\u1290 ";
wstring t = L"\uFB27\u0323 ";
wstring x = L"\u268D ";
wstring v = L"\u234A ";
wstring w = L"\u2234 ";
wstring u = L"\u0307/ ";
wstring y = L"|| ";
wstring z = L"\u2A05 ";

 wcout << a << b << c << d << e << f << g << h << i << j 
 << k << l << m << n << o << p << q << r << s << t 
 << u << v << w << x << y << z <<  L"\n \u263a  \n";

system("pause");
    return( 0 );
}