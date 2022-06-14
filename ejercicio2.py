print("Ejercicio 2 \n")

band = 0
cantidad_rondas = 0
rondas = []
jugador1 = []
jugador2 = [] 
ganador_ronda = []
with open("tabla.txt") as archivo:
    for linea in archivo:
        if(band == 0):
            cantidad_rondas = int(linea)
            band = 1
        else:
            rondas = linea.split(' ')
            jugador1.append(int(rondas[0]))
            jugador2.append(int(rondas[1]))
            if(int(rondas[0]) > int(rondas[1])):
                diferencia = int(rondas[0]) - int(rondas[1])
                ganador_ronda.append([1,diferencia])
            else:
                diferencia = int(rondas[1]) - int(rondas[0])
                ganador_ronda.append([2,diferencia])

mayor = ganador_ronda[0][1]
ganador = ganador_ronda[0][0]

for i in range(cantidad_rondas-1):
    dif1 = ganador_ronda[i][1]
    dif2 = ganador_ronda[i+1][1]
    
    if(mayor <= dif1):
        mayor = dif1
        ganador = ganador_ronda[0][0]
    elif (mayor <= dif2):     
        mayor = dif2
        ganador = ganador_ronda[1][0]
    
print(f"{ganador} {mayor}")