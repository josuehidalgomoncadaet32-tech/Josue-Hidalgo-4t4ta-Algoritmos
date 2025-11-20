def factorial_recursivo(n):
    if n <= 1:
        return 1
    else:
        return n * factorial_recursivo(n - 1)

numero = 5
resultado_factorial = factorial_recursivo(numero)
print(f"El factorial de {numero} es: {resultado_factorial}")

def sumar_lista_recursiva(lista):
    if not lista:
        return 0
    else:
        return lista[0] + sumar_lista_recursiva(lista[1:])

# Ejemplo de uso:
numeros = [1, 2, 3, 4]
resultado_suma = sumar_lista_recursiva(numeros)
print(f"La suma de los elementos de {numeros} es: {resultado_suma}")

class Medicamento:
    STOCK_CRITICO_UMBRAL = 10

    def __init__(self, nombre, categoria, stock, precio, codigo_barras):
        """Inicializa un nuevo objeto Medicamento."""
        self.nombre = nombre
        self.categoria = categoria
        # Aseguramos que el stock sea un entero
        self.stock = int(stock)
        self.precio = float(precio)
        self.codigo_barras = codigo_barras
        print(f"Medicamento '{self.nombre}' creado con {self.stock} unidades en stock.")

    def vender(self, cantidad):

        if cantidad > self.stock:
            print(f"ERROR: No hay suficiente stock de {self.nombre}.")
            print(f"Stock actual: {self.stock}. Cantidad solicitada: {cantidad}.")
            return False
        else:
            self.stock -= cantidad
            print(f"Venta exitosa. {cantidad} unidades de {self.nombre} vendidas.")
            print(f"Nuevo stock: {self.stock}.")
            return True


    def reponer_stock(self, cantidad):
        self.stock += cantidad
        print(f" Reposición exitosa. {cantidad} unidades añadidas a {self.nombre}.")
        print(f"Nuevo stock total: {self.stock}.")


    def esta_en_stock_critico(self):
        return self.stock < self.STOCK_CRITICO_UMBRAL

paracetamol = Medicamento(
    nombre="Paracetamol 500mg",
    categoria="Analgésico",
    stock=15,
    precio=5.50,
    codigo_barras="7790001000001"
)
print(f"¿Está {paracetamol.nombre} en stock crítico? {paracetamol.esta_en_stock_critico()}")
paracetamol.vender(cantidad=20)
paracetamol.vender(cantidad=8)
print(f"¿Está {paracetamol.nombre} en stock crítico? {paracetamol.esta_en_stock_critico()}")
paracetamol.reponer_stock(cantidad=50)
print(f"¿Está {paracetamol.nombre} en stock crítico? {paracetamol.esta_en_stock_critico()}")