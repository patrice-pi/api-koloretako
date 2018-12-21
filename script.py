#!/usr/bin/env python3

import sys
import requests
import random
import time

start = time.time()

def launchGame(level = 1):
	print('Niveau ' + str(level))
	life = 10
	getRandomColorsTab(level, life)

def checkInputColor(colorTab, level, life):
	nbElementColorTab = len(colorTab)
	j = 0
	while nbElementColorTab != 0 :
		colorInput = input("Entrez la bonne combinaison de couleurs :\r\n")
		
		if(colorTab[j] == colorInput):
			print('true')
			print('Success SON')
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
				r = requests.post('http://www.koloretako.loc/api/leaderboards', data = {'pseudo':pseudo, 'score':level, 'duration':durationGame})
				break
			else:
				print('recommencer')
				print('Erreur SON')
				print("Vie(s) restantes : " + str(life))
			j = 0

	if(life != 0):
		nextLevel = level + 1
		print("\r\nwin, on passe au niveau " + str(nextLevel))
		getRandomColorsTab(nextLevel, life)

def getRandomColorsTab(level, life):
	colorTab = []
	arrayColor = ['rouge', 'vert', 'bleu', 'jaune']
	i = 0
	while i < (3 + level) :
		colorTab.append(random.choice(arrayColor))
		time.sleep(0.4)
		if(colorTab[i] == "rouge"):
			print("rouge")
		elif(colorTab[i] == "vert"):
			print("vert")
		elif(colorTab[i] == "bleu"):
			print("bleu")
		elif(colorTab[i] == "jaune"):
			print("jaune")
		i = i+1

	print(colorTab)

	checkInputColor(colorTab, level, life)

launchGame()
