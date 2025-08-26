def ej1():
    try:
        num1 = float(input("Ingresa el primer número: "))
        num2 = float(input("Ingresa el segundo número: "))
        resultado = num1 / num2
        print(f"El resultado de la división es: {resultado}")
    except ZeroDivisionError:
        print("No podes dividir por 0 bola")
def ej2():
 while True:
    try:
        edad = int(input("Ingresa tu edad: "))
        print(f"Tu edad es: {edad}")
        break
    except ValueError:
        print("Que menso ingrestaste un numero que no es entero ajaja")
def ej3():
    nombres = ["Ana", "Pedro", "Sofía"]
    try:
        indice = int(input("Ingresa un índice (0 a 2): "))
        print(f"Nombre en el índice {indice}: {nombres[indice]}")
    except IndexError:
        print("No funca maestro")
    except ValueError:
        print("Por favor ingresa un numero valido te lo suplico")
def ej4():
    try:
        num1 = int(input("Ingresa el primer número: "))
        num2 = int(input("Ingresa el segundo número: "))
        suma = num1 + num2
        print(f"La suma es: {suma}")
    except ValueError:
        print("Uno o ambos numeros que ingresaste estan mal genio.")
def ej5():
    try:
        a = float(input("Ingresa el dividendo: "))
        b = float(input("Ingresa el divisor: "))
        resultado = a / b
        print(f"El resultado es: {resultado}")
    except ZeroDivisionError:
        print("No se puede dividir por cero bobo.")
    except ValueError:
        print(" ingresa solo números GENIO.")
    finally:
        print("Fin del programa de cálculo.")
