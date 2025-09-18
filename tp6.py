lista = []
x = 0

def busqueda_secuencial():
    for i in range(len(lista)):
        if lista[i] == x:
            return i
    return -1

def busqueda_binaria():
    inicio = 0
    fin = len(lista) - 1
    while inicio <= fin:
        medio = (inicio + fin) // 2
        if lista[medio] == x:
            return medio
        elif lista[medio] < x:
            inicio = medio + 1
        else:
            fin = medio - 1
    return -1

def ordenamiento_insercion():
    for i in range(1, len(lista)):
        actual = lista[i]
        j = i - 1
        while j >= 0 and lista[j] > actual:
            lista[j+1] = lista[j]
            j -= 1
        lista[j+1] = actual

def ordenamiento_burbuja():
    n = len(lista)
    for i in range(n):
        for j in range(0, n-i-1):
            if lista[j] > lista[j+1]:
                lista[j], lista[j+1] = lista[j+1], lista[j]

def ordenamiento_seleccion():
    n = len(lista)
    for i in range(n):
        minimo = i
        for j in range(i+1, n):
            if lista[j] < lista[minimo]:
                minimo = j
        lista[i], lista[minimo] = lista[minimo], lista[i]

while True:
    print("\n1. Crear lista")
    print("2. Buscar")
    print("3. Ordenar")
    print("4. Salir")
    op = input("Opción: ")

    if op == "1":
        lista = [int(input("Elemento: ")) for _ in range(int(input("Cantidad: ")))]
        print("Lista:", lista)

    elif op == "2":
        x = int(input("Buscar: "))
        tipo = input("1.Secuencial  2.Binaria: ")
        pos = busqueda_secuencial() if tipo == "1" else busqueda_binaria()
        print("Posición:", pos if pos != -1 else "No encontrado")

    elif op == "3":
        tipo = input("1.Inserción  2.Burbuja  3.Selección: ")
        if tipo == "1":
            ordenamiento_insercion()
        elif tipo == "2":
            ordenamiento_burbuja()
        else:
            ordenamiento_seleccion()
        print("Lista ordenada:", lista)

    elif op == "4":
        break
