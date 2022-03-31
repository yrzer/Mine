import java.util.Scanner;
public class Main{
    public static Scanner keyboard=new Scanner(System.in);
    public static int dd,mm,rrrr, nr_t;
    public static String[][] miesiace = {
    {"1", "2", "3", "4" ,"5" ,"6" ,"7" ,"8" ,"9" ,"10" ,"11" , "12"},
    {"styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień"},
    {"31", "29", "31", "30" ,"31" ,"30" ,"31" ,"31" ,"30" ,"31" ,"30" , "31"},
    {"pon", "wto", "śro", "czw" ,"pią" ,"sob" ,"nie" ,"error" ,"error" ,"error" ,"error" , "error"},};
    public static char[] c_txt;
    
    public static void w_data(){
        System.out.println("wprowadź date: dd mm rrrr");
        String s_txt = keyboard.nextLine();
        int dlugosc = s_txt.length();
        c_txt = new char[dlugosc];
        for (int i = 0; i < dlugosc; i++) {
            c_txt[i]= s_txt.charAt(i);
        }
        ///////////////////////////////
        if(c_txt[1] < '0' || c_txt[1] > '9'){ // d
        dd= Integer.parseInt("0" + (c_txt[0] - '0'));
    
            if(c_txt[3] < '0' || c_txt[3] > '9'){ // d m   3!=0-9 
                mm= Integer.parseInt("0" + (c_txt[2] - '0'));
        
            }else{ // d mm
                mm= Integer.parseInt((c_txt[2] - '0') + "" + (c_txt[3] - '0'));
            
            }

        }else{ // dd
        dd= Integer.parseInt((c_txt[0] - '0') + "" + (c_txt[1] - '0'));

            if(c_txt[4] < '0' || c_txt[4] > '9'){ // dd m 4!=0-9
            mm= Integer.parseInt("0" + (c_txt[3] - '0'));
    
            }else{// dd mm
            mm= Integer.parseInt((c_txt[3] - '0') + "" + (c_txt[4] - '0'));
        
            }

        }
                                             // 012345
        if(c_txt[3] < '0' || c_txt[3] > '9'){// d m rrrr
rrrr= Integer.parseInt((c_txt[4] - '0') + "" + (c_txt[5] - '0') + "" + (c_txt[6] - '0') + "" + (c_txt[7] - '0'));
        }
        else if(c_txt[4] < '0' || c_txt[4] > '9'){// dd m rrrr
rrrr= Integer.parseInt((c_txt[5] - '0') + "" + (c_txt[6] - '0') + "" + (c_txt[7] - '0') + "" + (c_txt[8] - '0'));
        }
        else if(c_txt[5] < '0' || c_txt[5] > '9'){// dd mm rrrr
rrrr= Integer.parseInt((c_txt[6] - '0') + "" + (c_txt[7] - '0') + "" + (c_txt[8] - '0') + "" + (c_txt[9] - '0'));
        }
////////////////////////////// 
    // errors
        if(dd <= 0 || dd >= 32){ // dni
            System.out.println("error - dni"); w_data();
        }
        if(mm <= 0 || mm >= 13){ // miesiąc
            System.out.println("error - miesiąc"); w_data();
        }
        if(mm == 2){
            if((rrrr%4==0 && rrrr%100!=0) || rrrr%400==0){ // rok jest przestępny
                if(dd > 29){
                    System.out.println("error - luty, przestępny"); w_data();
                }
            }else{ // nie
                if(dd > 28){
                    System.out.println("error - luty"); w_data();
                }
            }
        }
        int m =  Integer.parseInt(miesiace[2][mm-1]);
        if(dd > m){
            System.out.println("error - dni"); w_data();
        }
        ///
        System.out.println(dd+" "+miesiace[1][mm-1]+" "+rrrr);  
    }

    public static int liczbaDni[] = {0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334};

    public static void dzienTygodnia() {
        // int dzien, int miesiac, int rok
        // dd , mm , rrrr
        int dzienRoku;
        int yy, c, g;
        int wynik;
        int p_mm = 0;
        
        dzienRoku = 1 + liczbaDni[mm-1];
        if ((rrrr%4==0 && rrrr%100!=0) || rrrr%400==0){
            p_mm = 1;
        }
        if ((mm > 2) && (p_mm == 1)) dzienRoku++;
     
        yy = (rrrr - 1) % 100;
        c = (rrrr - 1) - yy;
        g = yy + (yy / 4);
        wynik = (((((c / 100) % 4) * 5) + g) % 7);
        wynik += dzienRoku - 1;
        wynik %= 7;
        nr_t = wynik;
    }

    public static void gen_kal(){ // generuj kaledarz
        int x = -7;
        int m =  Integer.parseInt(miesiace[2][mm-1]);
        dzienTygodnia();
        x-= nr_t; // dzień trygodnia
        for(int i=0; i<7; i++) {
            for(int y=0; y<7; y++){
                x++;
                if(i==0){
                    System.out.print(miesiace[3][y]+" ");
                }else if(x<=m && 0<x){
                    if(x==dd){// podświetl // \u001B[41m
                        System.out.print("\u001B[41m"+x+"\u001B[0m"+"  ");
                    }else{
                    System.out.print(x+"  ");}
                    if(x<10)System.out.print(" ");
                }else if(0>=x){
                    System.out.print("-   ");
                }
                
            }
        System.out.println("");}
        
    }

    public static void main(String []args){
        w_data();
        gen_kal();
    }
}