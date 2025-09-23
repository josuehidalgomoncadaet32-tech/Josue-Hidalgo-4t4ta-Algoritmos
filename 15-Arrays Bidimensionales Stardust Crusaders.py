def ej1():
    matriz = [
        [1, 2, 3, 4],
        [5, 6, 7, 8],
        [9, 10, 11, 12],
        [13, 14, 15, 16]
    ]
    suma=0
    n = len(matriz)
    suma += matriz[0][0]
    suma += matriz[0][n-1]
    suma += matriz[n-1][0]
    suma += matriz[n-1][n-1]

    print(suma)

def ej2():

    matriz = [
        [1, 2, 3],
        [4, 5, 6],
        [0, 8, 9]
        ]
    suma = 0
    y=2
    suma_inversa = 0
    for x in range(len(matriz)):
        suma += matriz[x][x]
    for n in range(len(matriz)):
        suma_inversa += matriz[n][y]
        y-=1

    print(f"La suma de la diagonal principal es: {suma}")
    print(f"La suma de la diagonal inversa es: {suma_inversa}")

def ej3():

    n = int(input("Ingrese un numero para formar la matriz identidad"))

    matriz = []

   for x in range(n):
    fila = []
    for i in range(n):
        if x == i:
            fila.append(1)  
        else:
            fila.append(0)   
    matriz_identidad.append(fila)

print("Matriz identidad", n, "x", n)
for fila in matriz_identidad:
    print(fila)


