import random
def juegoAhorcado_creaArchivo(): 
    pp=["pepe","nege","pera","azufre","acdc",]
    indicePalabra=random.randint(0,4)
    palabraAdivinar=pp[indicePalabra]
    palabra_=[]
    intentos=1
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
            print(f"jajaperdiste:( la palabra era {palabraAdivinar}")
            break
    with open("resultado.txt","w",encoding="utf-8") as archivo:
        archivo.write(f"la palabra era {palabraAdivinar} y la adivinaste en {intentos} intentos\n")
#--------------------------------------------------------------------------------------------------------------------------------#      
nombres = []
telefonos = []
def agregar_contacto():
    nombre = input("Ingrese el nombre del contacto: ").strip()
    telefono = input("Ingrese el número de teléfono: ").strip()
    nombres.append(nombre)
    telefonos.append(telefono)
    print(f"Contacto '{nombre}' agregado con éxito.\n")

def mostrar_contactos():
    if not nombres:
        print("No hay contactos para mostrar.\n")
    else:
        print("\nLista de contactos:")
        for x in range(len(nombres)):
            print(f"{x + 1}. {nombres[x]} - {telefonos[x]}")

def buscar_contacto():
    buscar = input("Ingrese el nombre del contacto a buscar: ").strip()
    if buscar in nombres:
        indice = nombres.index(buscar)
        print(f"Contacto encontrado: {nombres[indice]} - {telefonos[indice]}\n")
    else:
        print("Contacto no encontrado.\n")

def menu():
    while True:
        print("""
        -------Menu--------
        1. Agregar contacto
        2. Mostrar todos los contactos
        3. Buscar contacto por nombre
        4. Salir
        """)
        opcion = input("Seleccione una opción (1-4): ")

        if opcion == "1":
            agregar_contacto()
        elif opcion == "2":
            mostrar_contactos()
        elif opcion == "3":
            buscar_contacto()
        elif opcion == "4":
            print("saliendo...")
            break
        else:
            print("Opción inválida. Intente de nuevo.\n")
    with open("contactos.txt","w",encoding="utf-8") as archivo:
        for x in range(len(nombres)):

            archivo.write(f"{nombres[x]} - {telefonos[x]}\n")