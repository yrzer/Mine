#include <iostream>
#include <stdio.h>//print f?
#include <fcntl.h>// setmode
using namespace std;
int main()
{
 _setmode(_fileno(stdout), _O_U16TEXT);
 wprintf(L"test\n");//standard galactic alphabet
 // https://unicode-table.com/en/''liczba''/        \\liczba = \x'liczba'
wstring a = L"\x1511 ";
wstring b = L"\x0296 ";
wstring c = L"\x14F5 ";
wstring d = L"\x21B8 ";
wstring e = L"\x14B7 ";
wstring f = L"\x2393 ";
wstring g = L"\x22A3 ";
wstring h = L"\x2351 ";
wstring i = L"\x254E ";
wstring j = L"\x22EE ";
wstring k = L"\xA58C ";
wstring l = L"\xA58E ";
wstring m = L"\x14B2 ";
wstring n = L"\x30EA ";
wstring o = L"\x1D679 ";// https://unicode-table.com/en/1D679/ error
wstring p = L"¡! ";
wstring q = L"\x1451 ";
wstring r = L"\x2237 ";
wstring s = L"\x1290 ";
wstring t = L"\xFB27\x0323 ";
wstring u = L"\x268D ";
wstring v = L"\x234A ";
wstring w = L"\x2234 ";
wstring x = L"\x0307/ ";
wstring y = L"|| ";
wstring z = L"\x2A05 ";
 wcout << a << b << c << d << e << f << g << h << i << j 
 << k << l << m << n << o << p << q << r << s << t 
 << u << v << w << x << y << z <<  "\n";
 
system("pause");
    return( 0 );
}