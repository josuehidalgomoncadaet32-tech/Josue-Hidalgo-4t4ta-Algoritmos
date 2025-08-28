def EJ1():
    saldo = 1000
    while True:
        print(f"Saldo actual: ${saldo}")
        print("1. Depositar")
        print("2. Retirar")
        print("3. Salir")

        opcion = input("Elige una opción: ")
        try:
            if opcion == "1":
                monto = int(input("Monto a depositar: "))
                if monto > 0:
                    saldo += monto
                else:
                    print("El monto debe ser positivo.")
            elif opcion == "2":
                monto = int(input("Monto a retirar: "))
                if monto <= saldo and monto > 0:
                    saldo -= monto
                else:
                    print("Monto inválido o saldo insuficiente.")
            elif opcion == "3":
                print("Saliendo del programa...")
                break
            else:
                print("Opción inválida.")
        except ValueError:
            print("Error: Ingresa un número válido.")
def EJ2():
    try:
        peso = float(input("Ingresa tu peso (kg): "))
        altura = float(input("Ingresa tu altura (m): "))
        imc = peso / (altura ** 2)
        print(f"Tu IMC es: {imc:.2f}")
        if imc < 18.5:
            print("Veneco")
        elif 18.5 <= imc < 25:
            print("Normal")
        elif 25 <= imc < 30:
            print("Sobrepeso")
        else:
            print("Obesidad Morbida")
    except ValueError:
        print("Error: Ingresa valores numéricos válidos.")
    except ZeroDivisionError:
        print("La altura no puede ser 0.")
def EJ3():
    vocales = "aeiou"
    while True:
        frase = input("Ingresa una frase (o 'agusfortnite2008' para salir): ")
        if frase.lower() == "agusfortnite2008":
            print("Fin del programa.")
            break
        for v in vocales:
            nueva = ""
            for c in frase:
                if c.lower() in vocales:
                    nueva += v
                else:
                    nueva += c
            print(nueva)
def EJ4():
    frase = input("Ingresa una frase: ")
    palabras = frase.split()
    invertidas = [p[::-1] for p in palabras]
    print(" ".join(invertidas))
def EJ5():
    nombres = []
    while True:
        print("1. Agregar nombre")
        print("2. Mostrar nombre por posición")
        print("3. Salir")
        opcion = input("Elige una opción: ")

        try:
            if opcion == "1":
                nombre = input("Ingresa un nombre: ")
                nombres.append(nombre)
            elif opcion == "2":
                if not nombres:
                    print("La lista está vacía.")
                else:
                    pos = int(input("Ingresa la posición: "))
                    print("Nombre:", nombres[pos - 1])
            elif opcion == "3":
                print("Saliendo del programa...")
                break
            else:
                print("Opción inválida.")
        except ValueError:
            print("Error: Ingresa un número válido.")
        except IndexError:
            print("Error: Esa posición no existe en la lista.")
