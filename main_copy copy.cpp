#include <iostream>
#include <fstream>
#include <conio.h>
#include <stdlib.h>
#include <time.h>
#include <ctime>
#include <cstdio>
using namespace std;
int main()
{
    int lb;
    cout<<"liczba graczy"; cin>>lb;
    std::string nik[lb];
    for (int i = 0; i < lb; i++)
    {
        cout << i+1 << "nik = ";
        cin >> nik[i];
        cout << endl;
    }
    for (int i = 0; i < lb; i++)
    {
        cout << i+1 << "nik = ";
        cout << nik[i] << " " ;
    }
    cout << endl;
main();
    return 0 ;
}

/*
#include <iostream>
#include <fstream>
#include <conio.h>
#include <stdlib.h>
#include <time.h>
#include <ctime>
#include <cstdio>
using namespace std;
int lb_z(){int lb; cout<<"liczba graczy"; cin>>lb; return lb; }
string *ng(int lb,string nik[]){
    for (int i = 0; i < lb; i++)
    {
        cout << i+1 << "nik = ";
        cin >> nik[i];
        cout << endl;
    }
    return nik;
}
int main()
{
    int lb;
    lb_z();
    string nik[lb];
    ng(lb,nik);
    for (int i = 0; i < lb; i++)
    {
        cout << i+1 << "nik = ";
        cout << nik[i] << " ";
    }
    cout << endl;
main();
    return 0 ;
}
*/