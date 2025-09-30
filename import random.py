import random
palabrasPosibles=["pepe","lapiz","cebolla","raul","acdc",]
indicePalabra=random.randint(0,4)
palabraAdivinar=palabrasPosibles[indicePalabra]
palabra_=[]
intentos=0
cantidadLetras=len(palabraAdivinar)
for x in range(cantidadLetras):
    palabra_.append("_")
while True:
    print(palabra_,intentos)
    palabraUsuario=input("ingrese una letra: ")
    acierto= False
    for Indiceletra in range(len(palabraAdivinar)):
        for letraUsuario in palabraUsuario:
            if letraUsuario==palabraAdivinar[Indiceletra]:
                palabra_[Indiceletra]=letraUsuario
                acierto = True
    if not acierto:
        intentos += 1
    if not ("_" in palabra_):
        print(f"ganaste!! en {intentos} intentos")
        break
    elif intentos==7:
        print(f"perdiste:( la palabra era {palabraAdivinar}")
        break
