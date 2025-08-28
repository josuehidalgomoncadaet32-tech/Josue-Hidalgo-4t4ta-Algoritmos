def ej1():
    matriz = [
        [1, 2, 3, 4],
        [5, 6, 7, 8],
        [9, 10, 11, 12],
        [13, 14, 15, 16]
    ]
 #HOLA PROFE :D
    filas = len(matriz)
    columnas = len(matriz[0])

    for x in range(filas):
        suma_fila = 0
        for num in matriz[x]:
         suma_fila += num
         print(f"Suma fila {x+1}: {suma_fila}")


    for y in range(columnas):
        suma_columna = 0
        for x in range(filas):
            suma_columna += matriz[x][y]
        print(f"Suma columna {y+1}: {suma_columna}")
def ej2():
    matriz = [
        [1, 2, 3, 4],
        [5, 6, 7, 8],
        [9, 1, 2, 3],
        [4, 5, 6, 7]
    ]

    filas = len(matriz)
    columnas = len(matriz[0])


    transpuesta = []
    for i in range(columnas):
        fila_nueva = []
        for j in range(filas):
            fila_nueva.append(matriz[j][i])
        transpuesta.append(fila_nueva)

    print("Matriz original:")
    for fila in matriz:
        print(fila)

    print("Matriz transpuesta:")
    for fila in transpuesta:
        print(fila)
def ej3():
    matriz = [
        [1, 5, 3, 5],
        [8, 5, 9, 2],
        [4, 5, 6, 7]
    ]

    numero = int(input("Ingrese un número a buscar: "))

    contador = 0
    for fila in matriz:
        for num in fila:
            if num == numero:
                contador += 1

    print(f"El número {numero} aparece {contador} veces en la matriz.")
def ej4():
    matriz = [
        [1, 2, 3, 4],
        [5, 6, 7, 8],
        [9, 1, 2, 3],
        [4, 5, 6, 7]
    ]

    filas = len(matriz)
    columnas = len(matriz[0])

    total = 0
    for fila in matriz:
        for num in fila:
            total += num

    cantidad = filas * columnas
    promedio = total / cantidad

    print(f"Promedio: {promedio}")

    nueva_matriz = []
    for fila in matriz:
        nueva_fila = []
        for num in fila:
            if num < promedio:
                nueva_fila.append(promedio)
            else:
                nueva_fila.append(num)
        nueva_matriz.append(nueva_fila)

    print("Matriz original:")
    for fila in matriz:
        print(fila)

    print("Matriz modificada:")
    for fila in nueva_matriz:
        print(fila)
ej1()
ej2()
ej3()
ej4()
