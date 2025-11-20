def Ejercicio1_2_6():
    informacion={
            "Nombre":"Josue",
            "Apellido" : "Hidalgo",
            "Edad":16,
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

def ejercicio3Y4():
    Notas={
            "Lengua":6,
            "Ingles":9,
            "Laboratorio":7,
            "Base de datos":8,
            "proyecto":7,
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
