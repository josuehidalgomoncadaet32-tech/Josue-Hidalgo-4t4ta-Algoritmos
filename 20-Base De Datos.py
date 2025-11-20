import mysql.connector
import json
from mysql.connector import errorcode
cursor = None
cnx = None

def ConectarBase():
    global cnx, cursor
    try:
        cnx = mysql.connector.connect(user="root", password="", host="Localhost", database="gestion_db")
        cursor = cnx.cursor(dictionary=True)
        print('Conexión establecida')
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print('Usuario o contraseña incorrectos!')
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print('La base de datos no existe!')
        else:
            print(err)
def ConsultaSelect():
    tabla = input("ingrese la tabla que desee mostrar: ")
    Consulta = f"SELECT * FROM {tabla};"
    cursor.execute(Consulta)
    return cursor.fetchall()

def ConsultaInsertar():
    tabla = input("ingrese la tabla que desee mostrar: ")
    nombre=input("ingrese el nombre a insertar: ")
    dni = int(input("ingrese el nombre a insertar: "))
    correo = input("ingrese el correo a insertar: ")
    saldo = int(input("ingrese el nombre a insertar: "))
    sql = f"INSERT INTO {tabla} (nombre, dni, correo, saldo)VALUES( %s, %s, %s, %s)"
    cursor.execute(sql,(nombre,dni,correo,saldo))
    cnx.commit()
    return cursor.lastrowid

ConectarBase()

def mostrarTabla():
    tabla=input("ingrese la tabla que desee mostrar: ")
    for fila in ConsultaSelect(tabla):
        print(fila)
    return tabla

def CrearArchivo():
    dataTable=ConsultaSelect()
    with open("tabla.json",'w', encoding='utf-8') as archivo:
        json.dump(dataTable[0],archivo, indent=4, ensure_ascii=False)
        json.dump(dataTable[1], archivo, indent=4, ensure_ascii=False)

def Consultaupdate(columna,dato,ID):
    tabla = input("ingrese la tabla que desee mostrar: ")
    consulta=f"UPDATE `{tabla}` SET {columna} =%s WHERE `id`=%s"
    cursor.execute(consulta,(dato,ID))
    cnx.commit()
    return cursor.lastrowid
def menu():
    while True:
        opcion=int(input("""
        |--------------------|
        |      Consultas     |
        |                    |
        | 1)Select           |
        |                    |
        | 2)Update           |
        |                    |
        | 3)Insert           |
        |                    |
        | 4)Crear JSON       |
        |                    |
        | 5)Salir            |
        |                    |
        |--------------------|
        ingrese la opcion: """))
        if opcion==1:
            tabla=ConsultaSelect()
            for x in tabla:
                print(x)
        elif opcion == 2:
            columna=input("ingrese la columna a cambiar: ")
            dato=input("ingrese el dato a cambiar")
            ID=int(input("ingrese el id de la persona a modificar"))
            Consultaupdate(columna,dato,ID)
        elif opcion==3:
            ConsultaInsertar()
        elif opcion == 4:
            CrearArchivo()
        elif opcion==5:
            print("saliendo...")
            break
        else:
            print("ingrese una opcion valida")
menu()
if cnx.is_connected():
    cnx.close()
    print("La conexión a la base de datos ha sido cerrada.")