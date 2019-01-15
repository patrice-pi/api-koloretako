#!/usr/bin/env python3

import sys
import requests
import random
import time

start = time.time()

def launchGame(level = 1):
	print('Niveau ' + str(level))
	life = 2
	gameLvl = input("Choisissez un niveau de difficulté ( 1 - Facile / 2 - Intermédiaire / 3 - Difficile / 4 - Légende ):\r\n")

	if(gameLvl == "1") :
		print("Vous avez choisi le niveau de difficulté : Facile\r\n")
	elif(gameLvl == "2") :
		print("Vous avez choisi le niveau de difficulté : Intermédiaire\r\n")
	elif(gameLvl == "3") :
		print("Vous avez choisi le niveau de difficulté : Difficile\r\n")
	elif(gameLvl == "4") :
		print("Vous avez choisi le niveau de difficulté : Légende\r\n")

	time.sleep(1)
	getRandomColorsTab(level, life, gameLvl)


def getRandomColorsTab(level, life, gameLvl, numberElement = 4):
	colorTab = []
	arrayColor = ['rouge', 'vert', 'bleu', 'jaune']
	print("Niveau " + str(level))
	print(numberElement)
	print("Mémorisez la combinaison suivante :");

	for i in range(0, numberElement):
		colorTab.append(random.choice(arrayColor))

	print(colorTab)

	checkInputColor(colorTab, level, life, gameLvl, numberElement)

def checkInputColor(colorTab, level, life, gameLvl, numberElement):
	nbElementColorTab = len(colorTab)
	j = 0
	while nbElementColorTab != 0 :
		colorInput = input("Entrez la bonne combinaison de couleurs :\r\n")

		if(colorTab[j] == colorInput):
			print('true')
			nbElementColorTab = nbElementColorTab - 1
			j = j + 1
		else:
			nbElementColorTab = len(colorTab)
			life = life - 1
			if(life == 0):
				print('tu as perdu, tu as atteint le niveau : ' + str(level))
				end = time.time()
				durationGame = str(round(end - start, 2));
				print('La partie a duré ' + durationGame + 's')
				pseudo = input("Entrez votre pseudo :\r\n")
				r = requests.post('http://192.168.1.56/api/leaderboards', data = {'pseudo':pseudo, 'score':level, 'duration':durationGame})
				break
			else:
				print('recommencer')
				print("Vie(s) restantes : " + str(life))
			j = 0


	if(life != 0):
		nextLevel = level + 1

		if(gameLvl == "1") :
			if(nextLevel % 10 == 0):
				numberElement = numberElement + 1
			else :
				numberElement = numberElement
		elif(gameLvl == "2") :
			if(nextLevel % 5 == 0):
				numberElement = numberElement + 1
			else :
				numberElement = numberElement
		elif(gameLvl == "3") :
			numberElement = 3 + nextLevel
		elif(gameLvl == "4") :
			numberElement = 3 + nextLevel

		print("\r\n * * * BRAVO ! Tu passe au niveau " + str(nextLevel) + " * * * \r\n")
		getRandomColorsTab(nextLevel, life, gameLvl, numberElement)

launchGame()
