def ganaron(matriz):
    # Verificar filas y columnas
    for i in range(3):
        if matriz[i][0] == matriz[i][1] == matriz[i][2] != " ":
            print(f"ganaron las {matriz[i][0]}")
            return True
        if matriz[0][i] == matriz[1][i] == matriz[2][i] != " ":
            print(f"ganaron las {matriz[0][i]}")
            return True
    # Verificar diagonales
    if matriz[0][0] == matriz[1][1] == matriz[2][2] != " ":
        print(f"ganaron las {matriz[0][0]}")
        return True
    elif matriz[0][2] == matriz[1][1] == matriz[2][0] != " ":
        print(f"ganaron las {matriz[0][2]}")
        return True
    else:return False

matriz = [
    [" ", " ", " "],
    [" ", " ", " "],
    [" ", " ", " "]]
turno = 9
while not ganaron(matriz) and turno > 0:
    cont=0
    for fila in matriz:
        cont += 1
        print(fila, cont)
    print("  1 ", "  2 ", "  3 ")
    jugador = "O" if turno % 2 == 0 else "X"
    while True:
        try:
            filas = int(input("ingrese la fila de tu turno (1-3): "))
            columnas = int(input("ingrese la columna de tu turno (1-3): "))
            if 1 <= filas <= 3 and 1 <= columnas <= 3:
                if matriz[filas - 1][columnas - 1] == " ":
                    matriz[filas - 1][columnas - 1] = jugador
                    turno -= 1
                    break
                else:
                    print("Esa casilla ya está ocupada, elige otra.")
            else:
                print("Fila y columna deben estar entre 1 y 3.")
        except ValueError:
            print("Por favor ingresa números válidos.")
cont=0
for fila in matriz:
    cont += 1
    print(fila, cont)
print("  1 ", "  2 ", "  3 ")
