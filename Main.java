import java.util.Scanner;
public class Main{
    public static Scanner keyboard=new Scanner(System.in);
    public static int dd,mm,rrrr;
    public static String[][] miesiace = {{"1", "2", "3", "4" ,"5" ,"6" ,"7" ,"8" ,"9" ,"10" ,"11" , "12"},{"styczeń","luty","marzec","kwiecień","maj","czerwiec","lipiec","sierpień","wrzesień","październik","listopad","grudzień"},{"31", "29", "31", "30" ,"31" ,"30" ,"31" ,"31" ,"30" ,"31" ,"30" , "31"}};
    public static char[] c_txt;

    public static void start(){
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
if(dd < 0 || dd > 32){

}
if(mm < 0 || mm > 13){

    if(mm == 2 || dd > 29){
        // (rok%4==0 && rok%100!=0) || rok%400==0
    }
};
        System.out.println(dd+" "+mm+" "+rrrr);
    }

    public static void main(String []args){
        start();
        
        
    }
}
/* if(dlugosc < 3){
            int nr = Integer.parseInt(s_txt);
            System.out.println(nr);
            if(nr<32 && nr>0){
                dd=nr; //podaj inne 
            }else{
                System.out.println("error");
            }
         }else{
            for (int i = 0; i < dlugosc; i++) {
                if(c_txt[i] == '/'){

                }else if(c_txt[i] == ' '){

                    
                }else if(c_txt[i] == '\\'){
                    
                }else if(c_txt[i] == '.'){
                    dd= Integer.parseInt((c_txt[0] - '0') + "" + (c_txt[1] - '0'));
                    break;
                }
            }
           
        } */