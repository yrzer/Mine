import tkinter as tk # https://docs.python.org/3/library/ # https://www.youtube.com/watch?v=TuLxsvK4svQ

path = "obiektowe/"
w = tk.Tk()
w.geometry("670x420")
w.title("kalkulator stopni")
w.config(background="black")


smaki = [["slodki","slony","kwasny", "gorzki", "pikantny","mietowy"],
         [50,120,210,50,120,210],[190,190,190,220,220,220],]
def click():
    try:
        kk = kod_kreskowy.get()
    except:
        error = tk.Label(w,text="wpisz kod kreskowy",font=("Comic Sans",10),fg="#00ff00",bg="black") # checkbutton
        error.place(x=50,y=350)
    else:
        wk = float(wielkosc.get())/100
        sm = smak_X.get()
        if sm == 0:
            sm=smaki[0][0]
        elif sm == 1:
            sm=smaki[0][1]
        elif sm == 2:
            sm=smaki[0][2]
        elif sm == 3:
            sm=smaki[0][3]
        elif sm == 4:
            sm=smaki[0][4]
        elif sm == 5:
            sm=smaki[0][5]
        ck = cukier_X.get()
        
        f_w = open(path+"txt_sklep.txt", "w")
        f_w.write("\n")
        f_r = open(path+"txt_sklep.txt", "r")
        # r = f_r.read()
        # f_w.write("XD ")
        f_w.write("kod_kreskowy: "+kk+"\n")
        f_w.write("wielkosc: "+str(wk)+"L\n")
        f_w.write("smak: "+sm+"\n")
        f_w.write("wersja_lite: "+str(ck)+"\n")
        
    
txt = tk.Label(w,text="monster energy z.o.o",font=("Comic Sans",10),fg="#00ff00",bg="black")
txt.pack()

kod_kreskowy_txt = tk.Label(w,text="wpisz kod kreskowy:",font=("Comic Sans",10),fg="#00ff00",bg="black")
kod_kreskowy_txt.place(x=50,y=50)

kod_kreskowy= tk.Entry(w,font=("Comic Sans",10))
kod_kreskowy.place(x=50,y=70)

wielkosc_txt = tk.Label(w,text="zaznacz wielkosc: // 100 = 1L",font=("Comic Sans",10),fg="#00ff00",bg="black") #scale
wielkosc_txt.place(x=50,y=100)

wielkosc = tk.Scale(w, from_=0, to=200,length=300, orient="horizontal", resolution=5) 
wielkosc.place(x=50,y=120)

smak_txt = tk.Label(w,text="jakie smaki:",font=("Comic Sans",10),fg="#00ff00",bg="black") # checkbutton
smak_txt.place(x=50,y=170)

smak_X= tk.IntVar()
for x in range(6):
    smak = tk.Radiobutton(w,text=smaki[0][x],font=("Comic Sans",10),variable=smak_X,value=x)
    smak.place(x=smaki[1][x],y=smaki[2][x])


cukier_txt = tk.Label(w,text="wersja bez cukru?",font=("Comic Sans",10),fg="#00ff00",bg="black") # radiobuttons
cukier_txt.place(x=50,y=250)

cukier_X = tk.BooleanVar()
cukier = tk.Checkbutton(w,font=("Comic Sans",10),variable=cukier_X,onvalue=True,offvalue=False,)
cukier.place(x=50,y=280)

button = tk.Button(w, text="zatwierdz",font=("Comic Sans",10),command=click) 
button.place(x=450,y=350)


w.mainloop() 