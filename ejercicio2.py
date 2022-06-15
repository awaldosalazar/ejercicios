import sys

"""
5 140 82 89 134 90 110 112 106 88 90 
"""


print("Ejercicio 2 \n")


f = open("tabla.txt","w")
f.write(f"{sys.argv[1]}\n{sys.argv[2]} {sys.argv[3]}\n{sys.argv[4]} {sys.argv[5]}\n{sys.argv[6]} {sys.argv[7]}\n{sys.argv[8]} {sys.argv[9]}\n{sys.argv[10]} {sys.argv[11]}")
f.close()

band = 0
cantidad_rondas = 0
rondas = []
jugador1 = []
jugador2 = [] 
ganador_ronda = []
diferencias = []
with open("tabla.txt") as archivo:
    for linea in archivo:
        if(band == 0):
            cantidad_rondas = int(linea)
            band = 1
        else:
            rondas = linea.split(' ')
            if(band == 1): 
                jugador1.append(int(rondas[0]))
                jugador2.append(int(rondas[1]))    
                band = 2
            else:
                index = len(jugador1) - 1
                jugador1.append(int(rondas[0]) + jugador1[index])
                jugador2.append(int(rondas[1]) + jugador2[index])
                

for i in range(cantidad_rondas):
    if(jugador1[i] > jugador2[i]):
        diferencia = jugador1[i] - jugador2[i]
        ganador_ronda.append([1])
        diferencias.append([diferencia])
    else:
        diferencia = jugador2[i] - jugador1[i]
        ganador_ronda.append([2])
        diferencias.append([diferencia])


diferencia_ganadora = max(diferencias)
posicion = diferencias.index(diferencia_ganadora)
ganador = ganador_ronda[posicion]

f = open('resultado.txt','w')
f.write(f"{ganador[0]} {diferencia_ganadora[0]}")
f.close()