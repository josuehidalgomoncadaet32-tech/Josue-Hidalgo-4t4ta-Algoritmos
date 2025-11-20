import json
def Ejercicio1_2_6():
    informacion={
            "Nombre":"chocue",
            "Apellido" : "hidalgo",
            "Edad":17,
            "Ciudad":"CABA",
            "Profecion":"Estudiante"
        }
    print(f"""
            Nombre: {informacion["Nombre"]}
            Apellido: {informacion['Apellido']}
            Edad: {informacion['Edad']}
            Ciudad: {informacion['Ciudad']}
            Profecion: {informacion['Profecion']}
            """)
    #Ejercicio 2

    informacion["Telefono"]=1125477005
    informacion["Email"]="josuehidalgomoncada.et32@gmail.com"
    print(f"""
            Nombre: {informacion["Nombre"]}
            Apellido: {informacion['Apellido']}
            Edad: {informacion['Edad']}
            Ciudad: {informacion['Ciudad']}
            Profecion: {informacion['Profecion']}
            Telefono: {informacion['Telefono']}
            Email: {informacion['Email']}
            """)
    #Ejercicio6
    del informacion["Telefono"]
    print(f"""
            Nombre: {informacion["Nombre"]}
            Apellido: {informacion['Apellido']}
            Edad: {informacion['Edad']}
            Ciudad: {informacion['Ciudad']}
            Profecion: {informacion['Profecion']}
            Email: {informacion['Email']}
            """)
    with open("ejercicio1.json","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 1\n", archivo, indent=4, ensure_ascii=False)
        json.dump(f"el diccionario es {informacion}\n", archivo, indent=4, ensure_ascii=False)
    with open("ejercicio2.JSON","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 2\n", archivo, indent=4, ensure_ascii=False)
        json.dump(f"el diccionario es {informacion}\n", archivo, indent=4, ensure_ascii=False)
    with open("ejercicio6.JSON","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 6\n", archivo, indent=4, ensure_ascii=False)
        json.dump(f"el diccionario es {informacion}\n", archivo, indent=4, ensure_ascii=False)
Ejercicio1_2_6()
def ejercicio3Y4():
    Notas={
            "Lengua":8,
            "Ingles":9,
            "Laboratorio":10,
            "Base de datos":8,
            "proyecto":10,
        }
    asignatura=input("ingrese la asigntura que desea revisar(Mayuscula al inicio): ")
    print(Notas[asignatura])
    #ejercicio4
    promedio=0
    cantidad=len(Notas)
    for nota in Notas:
        promedio+=Notas[nota]
    promedio/=cantidad
    print(f"el promedio es:{promedio}")
    with open("ejercicio3.JSON","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 3")
        json.dump(f"el diccionario es {Notas}")
    with open("ejercicio4.JSON","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 4")
        json.dump(f"el diccionario es {Notas}")
def capitales_paises():
    paises = {
        "Argentina": "Buenos Aires",
        "Brasil": "Brasilia",
        "Chile": "Santiago",
        "Uruguay": "Montevideo",
        "Paraguay": "Asunción",
        "España": "Madrid",
        "Francia": "París",
        "Italia": "Roma"
    }
    pais = input("Ingrese un país: ")
    capital = paises[pais]
    if capital:
        print(f"La capital de {pais} es {capital}.")
    else:
        print("Ese país no está" )
    with open("ejercicio5.JSON","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 5\n")
        json.dump(f"el diccionario es {paises}\n")
def calcular_costo():
    precios = {
        "pan": 300,
        "leche": 500,
        "queso": 1200,
        "huevos": 900,
        "azúcar": 700,
        "arroz": 800
    }
    producto=input("ingrese el producto a comprar: ")
    cantidad=int(input("ingrese la cantidad deseada"))
    if producto in precios:
        total = precios[producto] * cantidad
        print(f"El costo total de {cantidad} {producto}(s) es ${total}.")
    else:
        print("El producto no está en la tienda.")
    with open("ejercicio6.json","w") as archivo:
        json.dump("Ejercicio 6\n")
        json.dump(f"el diccionario es {precios}\n")
#-------------------------------------------------------------------------------------------#

productos = [
    {"nombre": "Laptop", "precio": 1200, "categoria": "Electrónica"},
    {"nombre": "Mouse", "precio": 25, "categoria": "Electrónica"},
    {"nombre": "Teclado", "precio": 75, "categoria": "Electrónica"},
    {"nombre": "Silla de Oficina", "precio": 300, "categoria": "Muebles"}]

def recorrerDiccionario():
    for producto in productos:
        print(producto["nombre"])
def sumaTotal():
    suma=0
    for producto in productos:
        suma+=producto["precio"]
    print(f"la suma total de los precios es de {suma}")
def añadirProducto():
    nombre=input("ingrese el nombre del producto a añadir: ")
    precio=int(input("Ingrese el precio del producto:"))
    categoria=input("Ingrese la categoria del producto")
    producto={"nombre":nombre,"precio":precio,"categoria":categoria}
    productos.append(producto)
def actualizacionPrecio():
    indice=int(input("ingrese la pocicion del producto al que desea cambiar el precio: "))
    NuevoPrecio=int(input("ingrese el nuevo precio: "))
    productos[indice]["precio"]=NuevoPrecio
    print(productos[indice])
def menu():
    while True:
        print("1. Recorrer diccionario")
        print("2. Sumar total")
        print("3. Añadir producto")
        print("4. Actualizar precio")
        print("5. Salir")
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            recorrerDiccionario()
        elif opcion == "2":
            sumaTotal()
        elif opcion == "3":
            añadirProducto()
        elif opcion == "4":
            actualizacionPrecio()
        elif opcion == "5":
            print("Saliendo del programa...")
            break
        else:
            print("Opción no válida.")
    with open("ejercicio7.json","w",encoding="utf-8") as archivo:
        json.dump("Ejercicio 7\n")
        json.dump(f"el diccionario es {productos}\n")