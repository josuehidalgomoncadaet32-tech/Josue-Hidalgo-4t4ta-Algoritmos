import random
def palabraLarga():
    palabras=["pepe","langosta","parangutirimicuaro","trapeciomegamorfo","metacarpiano","liposuccionn","adenoidectomía","javaScript","pito","pitodoble"]
    largoMaximo=0
    for palabra in palabras:
        indice=len(palabra)
        if indice>largoMaximo:
            largoMaximo=indice
    print(f"la palabra mas larga es de {largoMaximo}")
def vocales():
    vocales=["a","o","i","e","u"]
    palabras = ["pepe", "langosta", "parangutirimicuaro", "trapeciomegamorfo", "metacarpiano", "liposuccionn","adenoidectomía", "javaScript", "pito", "pitodoble"]
    conteoVocales=0
    for palabra in palabras:
        for letra in palabra:
            if letra in vocales:
                conteoVocales+=1
    print(F"la cantidad de vocales final es de: {conteoVocales}")
def multLista():
    numerosInicio=[1,22,333,4444,55555,666666,7777777,88888888,999999999]
    numerosX4=[]
    for numero in numerosInicio:
        numerofinal=numero*4
        numerosX4.append(numerofinal)
    print(numerosX4)
MANO=[]
def dar_carta():
    carta_final=[]
    palo=["corazon","diamante","espada","pica"]
    carta=[1,2,3,4,5,6,7,8,9,10,11,12,13]
    palo_random=random.randint(0,3)
    valor=random.randint(0,12)
    carta_final.append(carta[valor])
    carta_final.append(palo[palo_random])
    return carta_final
def generar_mano_y_valor():
    for x in range(0,8):
        MANO.append(dar_carta())
    print(MANO)
def descartar():
    cantidadDescartar=int(input("ingrese cuantas desea descartar: "))
    for x in range(cantidadDescartar):
        carta_descartar=int(input("que carta desea descartar(posicion): "))
        MANO[carta_descartar-1]=dar_carta()
    print(MANO)
def menu_juego():
    while True:
        print(f"""
        |=======================|
        |                       |
        | 1)pedir mano          |    
        |                       |
        | 2)descartar           |
        |                       |
        | 3)fold                |
        |=======================|
        """)
        opcion=int(input("ingrese una opcion: "))
        if opcion==1:
            generar_mano_y_valor()
        elif opcion==2:
            descartar()
        elif opcion==3:
            print("saliendo...")
            break
        else:
            print("ingrese una opcion valida")
menu_juego()