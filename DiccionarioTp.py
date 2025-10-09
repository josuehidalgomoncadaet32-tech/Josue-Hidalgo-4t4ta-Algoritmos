def ej1():
    productos = [
        {"nombre": "Laptop", "precio": 1200, "categoria": "Electrónica"},
        {"nombre": "Mouse", "precio": 25, "categoria": "Electrónica"},
        {"nombre": "Teclado", "precio": 75, "categoria": "Electrónica"},
        {"nombre": "Silla de Oficina", "precio": 300, "categoria": "Muebles"}
    ]

    for productos in productos:
        print(f"Productos:{productos['nombre']}")
def ej2():
    productos = [
        {"nombre": "Laptop", "precio": 1200, "categoria": "Electrónica"},
        {"nombre": "Mouse", "precio": 25, "categoria": "Electrónica"},
        {"nombre": "Teclado", "precio": 75, "categoria": "Electrónica"},
        {"nombre": "Silla de Oficina", "precio": 300, "categoria": "Muebles"}
    ]
    suma_total=0
    for productos in productos:
     suma_total += productos["precio"]
    print(f"suma:{suma_total}")
def ej3():
    productos = [
        {"nombre": "Laptop", "precio": 1200, "categoria": "Electrónica"},
        {"nombre": "Mouse", "precio": 25, "categoria": "Electrónica"},
        {"nombre": "Teclado", "precio": 75, "categoria": "Electrónica"},
        {"nombre": "Silla de Oficina", "precio": 300, "categoria": "Muebles"}
    ]
    nuevoproducto = {"nombre": "Silla de gamer", "precio": 600, "categoria": "Muebles"}

    productos.append(nuevoproducto)
    print(productos)
def ej4():
    productos = [
        {"nombre": "Laptop", "precio": 1200, "categoria": "Electrónica"},
        {"nombre": "Mouse", "precio": 25, "categoria": "Electrónica"},
        {"nombre": "Teclado", "precio": 75, "categoria": "Electrónica"},
        {"nombre": "Silla de Oficina", "precio": 300, "categoria": "Muebles"}
    ]
    productos[1]["precio"] = 16
    print(productos[1])
def ej5():
    estudiantes = [
        {"nombre": "Ana", "edad": 21, "calificacion": 90},
        {"nombre": "Luis", "edad": 22, "calificacion": 95},
        {"nombre": "Marta", "edad": 20, "calificacion": 85}
    ]
    val=0
    for estudiantes in estudiantes:
        if estudiantes["calificacion"]>val:
            val=estudiantes["calificacion"]
            mejor=estudiantes
    print(f"mejor estudiante es: {mejor}")
def ej6():
    estudiantes = [
        {"nombre": "Ana", "edad": 21, "calificacion": 90},
        {"nombre": "Luis", "edad": 22, "calificacion": 95},
        {"nombre": "Marta", "edad": 20, "calificacion": 85}
    ]
    nombre=[]
    for x in estudiantes:
        nombre.append(x["nombre"])
    print(nombre)
def ej7():
    libros = [
        {"titulo": "Cien Años de Soledad", "autor": "Gabriel García Márquez"},
        {"titulo": "Don Quijote", "autor": "Miguel de Cervantes"},
        {"titulo": "La Sombra del Viento", "autor": "Carlos Ruiz Zafón"}
    ]
    respaldo = {"titulo": "Don Quijote", "autor": "Miguel de Cervantes"}
    print(f"diccionario original: {libros}")
    del libros[1]
    print(f"diccionario actualizado: {libros}")
    libros.append(respaldo)
    print(f"diccionario Actualizado: {libros}")
def ej8():
    libros = [
        {"titulo": "Cien Años de Soledad", "autor": "Gabriel García Márquez"},
        {"titulo": "Don Quijote", "autor": "Miguel de Cervantes"},
        {"titulo": "La Sombra del Viento", "autor": "Carlos Ruiz Zafón"}
    ]
    for libros in libros:
        libros["disponible"]=True
        print(libros)
ej1()
ej2()
ej3()
ej4()
ej5()
ej6()
ej7()
ej8()



