#Crear una matriz de 52x2 que contenga todas las cartas del mazo (del 1 al 13 de Picas, Tréboles, Diamantes y Corazones). Cuando digo crear la matriz; me refiero a crear un programa que lo haga automáticamente (utilizando ciclos for para generarla), no me hagan manualmente la matriz.
#Si los números de carta son 1, 11, 12 o 13 cambiarlos por A, J, Q y K respectivamente.
#Sumar el valor de chips total del mazo, manejar las excepciones en caso de que sean cartas sin número.
import random
def creacionmazo():
    posiblesPalos = ["Corazones", "Diamantes", "Tréboles", "Picas"]
    mazo = []
    for palo in posiblesPalos:
        for numero in range(1, 14):
            if numero == 1:
                aux = "A"
            elif numero == 11:
                aux = "J"
            elif numero == 12:
                aux = "Q"
            elif numero == 13:
                aux = "K"
            else:
                aux = numero
            carta = [aux, palo]
            mazo.append(carta)
    return mazo

def crearMano():
    mano = []
    global mazo
    for _ in range(5):
        indice = random.randint(0, len(mazo) - 1)
        mano.append(mazo[indice])
        mazo.pop(indice)
    return mano


def descartar_carta():
    global mano, mazo
    print("Tu mano:", mano)
    try:
        descartado = []
        indice = int(input("Ingrese la posición de la carta que desea descartar (1-5): "))
        if 1 <= indice <= len(mano):
            carta_descartada = mano.pop(indice - 1)
            print(f"Descartaste: {carta_descartada}")
            if len(mazo) > 0:
                nueva_carta = mazo.pop(random.randint(0, len(mazo) - 1))
                mano.append(nueva_carta)
                print(f"Tu nueva carta es: {nueva_carta}")
            else:
                print("El mazo está vacío, no se puede reponer carta.")
            descartado.append(carta_descartada)
        else:
            print("Posición inválida.")
    except ValueError:
        print("Por favor ingrese un número válido.")

mazo = creacionmazo()
mano = creacionmazo()
while True:
    try:
        opcion = int(input("""
              |====================|
              |        menu        |
              |                    |
              |1) mostrar mazo     |
              |                    |
              |2) descartar        |
              |                    |   
              |3) salir            |
              |                    |
              |====================|

              ingrese una opcion: """
                           ))
        if opcion == 1:
            print(f"El mazo es: {mazo}")
        elif opcion == 2:
            descartar_carta()
        elif opcion == 3:
            print("Saliendo...")
            break
        else:
            print("Poné una opción válida.")
    except ValueError:
        print("Ingrese una opción válida.")