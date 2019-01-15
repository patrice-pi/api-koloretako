#!/usr/bin/env python3
########################################################################
# Filename    : ColorfulLED.py
# Description : A auto flash ColorfulLED
# Author      : freenove
# modification: 2018/08/02
########################################################################

from PCF8574 import PCF8574_GPIO
from Adafruit_LCD1602 import Adafruit_CharLCD

import sys
import requests
import RPi.GPIO as GPIO
import time
from time import sleep
import random
import math

pins = {'pin_R': 22, 'pin_G': 37, 'pin_B': 13}  # pins is a dict
buttonPinJaune = 36  # define the buttonPin
buttonPinRouge = 12  # Bouton Rouge
buttonPinVert = 38  # Bouton Vert
buttonPinBleu = 40  # Bouton Bleu

buzzerPin = 16  # define the buzzerPin


CL = [0, 131, 147, 165, 175, 196, 211, 248]		# Frequency of Low C notes

CM = [0, 262, 294, 330, 350, 393, 441, 495]		# Frequency of Middle C notes

CH = [0, 525, 589, 661, 700, 786, 882, 990]		# Frequency of High C notes

# Notes of song1
song_1 = [CM[3], CM[5], CM[6], CM[3], CM[2], CM[3], CM[5], CM[6],
          CH[1], CM[6], CM[5], CM[1], CM[3], CM[2], CM[2], CM[3],
          CM[5], CM[2], CM[3], CM[3], CL[6], CL[6], CL[6], CM[1],
          CM[2], CM[3], CM[2], CL[7], CL[6], CM[1], CL[5]]

# Beats of song 1, 1 means 1/8 beats
beat_1 = [1, 1, 3, 1, 1, 3, 1, 1,
          1, 1, 1, 1, 1, 1, 3, 1,
          1, 3, 1, 1, 1, 1, 1, 1,
          1, 2, 1, 1, 1, 1, 1, 1,
          1, 1, 3]
# Notes of song2
song_2 = [CM[1], CM[1], CM[1], CL[5], CM[3], CM[3], CM[3], CM[1],
          CM[1], CM[3], CM[5], CM[5], CM[4], CM[3], CM[2], CM[2],
          CM[3], CM[4], CM[4], CM[3], CM[2], CM[3], CM[1], CM[1],
          CM[3], CM[2], CL[5], CL[7], CM[2], CM[1]]
# Beats of song 2, 1 means 1/8 beats
beat_2 = [1, 1, 2, 2, 1, 1, 2, 2,
          1, 1, 2, 2, 1, 1, 3, 1,
          1, 2, 2, 1, 1, 2, 2, 1,
          1, 2, 2, 1, 1, 3]

sound_mario_1 = [480, 1568, 1568, 1568,
                 740, 784, 784, 784,
                 370, 392, 370, 392, 392, 196,
                 740, 784, 784, 740, 784, 784, 740, 84, 880, 831, 880, 988,
                 880, 784, 699, 740, 784, 784, 740, 784, 784, 740, 784, 880, 830, 880, 988]
sound_mario_2 = [1108, 1174, 1480, 1568,
                 740, 784, 784, 740, 784, 784, 740, 784, 880, 830, 880, 988,
                 880, 784, 699,
                 659, 699, 784, 880, 784, 699, 659,
                 587, 659, 699, 784, 699, 659, 587,
                 523, 587, 659, 699, 659, 587, 494, 523,
                 349, 392, 330, 523, 494, 466,
                 440, 494, 523, 880, 494, 880, 1760, 440,
                 392, 440, 494, 784, 440, 784, 1568, 392,
                 349, 392, 440, 699, 415, 699, 1397, 349,
                 330, 311, 330, 659, 699, 784,
                 440, 494, 523, 880, 494, 880, 1760, 440,
                 392, 440, 494, 784, 440, 784, 1568, 392,
                 349, 392, 440, 699, 659, 699, 740, 784, 392, 392, 392, 392, 196, 196, 196,
                 185, 196, 185, 196, 208, 220, 233, 247]

beat_mario_1 = [2, 2, 2, 2,
                2, 2, 2, 2,
                2, 2, 2, 2, 4, 4,
                2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4,
                2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 4]
beat_mario_2 = []

# Music GIT
notes = {
    'B0': 31,
    'C1': 33, 'CS1': 35,
    'D1': 37, 'DS1': 39,
    'EB1': 39,
    'E1': 41,
    'F1': 44, 'FS1': 46,
    'G1': 49, 'GS1': 52,
    'A1': 55, 'AS1': 58,
    'BB1': 58,
    'B1': 62,
    'C2': 65, 'CS2': 69,
    'D2': 73, 'DS2': 78,
    'EB2': 78,
    'E2': 82,
    'F2': 87, 'FS2': 93,
    'G2': 98, 'GS2': 104,
    'A2': 110, 'AS2': 117,
    'BB2': 123,
    'B2': 123,
    'C3': 131, 'CS3': 139,
    'D3': 147, 'DS3': 156,
    'EB3': 156,
    'E3': 165,
    'F3': 175, 'FS3': 185,
    'G3': 196, 'GS3': 208,
    'A3': 220, 'AS3': 233,
    'BB3': 233,
    'B3': 247,
    'C4': 262, 'CS4': 277,
    'D4': 294, 'DS4': 311,
    'EB4': 311,
    'E4': 330,
    'F4': 349, 'FS4': 370,
    'G4': 392, 'GS4': 415,
    'A4': 440, 'AS4': 466,
    'BB4': 466,
    'B4': 494,
    'C5': 523, 'CS5': 554,
    'D5': 587, 'DS5': 622,
    'EB5': 622,
    'E5': 659,
    'F5': 698, 'FS5': 740,
    'G5': 784, 'GS5': 831,
    'A5': 880, 'AS5': 932,
    'BB5': 932,
    'B5': 988,
    'C6': 1047, 'CS6': 1109,
    'D6': 1175, 'DS6': 1245,
    'EB6': 1245,
    'E6': 1319,
    'F6': 1397, 'FS6': 1480,
    'G6': 1568, 'GS6': 1661,
    'A6': 1760, 'AS6': 1865,
    'BB6': 1865,
    'B6': 1976,
    'C7': 2093, 'CS7': 2217,
    'D7': 2349, 'DS7': 2489,
    'EB7': 2489,
    'E7': 2637,
    'F7': 2794, 'FS7': 2960,
    'G7': 3136, 'GS7': 3322,
    'A7': 3520, 'AS7': 3729,
    'BB7': 3729,
    'B7': 3951,
    'C8': 4186, 'CS8': 4435,
    'D8': 4699, 'DS8': 4978
}
melody = [
    notes['E7'], notes['E7'], 0, notes['E7'],
    0, notes['C7'], notes['E7'], 0,
    notes['G7'], 0, 0, 0,
    notes['G6'], 0, 0, 0,

    notes['C7'], 0, 0, notes['G6'],
    0, 0, notes['E6'], 0,
    0, notes['A6'], 0, notes['B6'],
    0, notes['AS6'], notes['A6'], 0,

    notes['G6'], notes['E7'], notes['G7'],
    notes['A7'], 0, notes['F7'], notes['G7'],
    0, notes['E7'], 0, notes['C7'],
    notes['D7'], notes['B6'], 0, 0,

    notes['C7'], 0, 0, notes['G6'],
    0, 0, notes['E6'], 0,
    0, notes['A6'], 0, notes['B6'],
    0, notes['AS6'], notes['A6'], 0,

    notes['G6'], notes['E7'], notes['G7'],
    notes['A7'], 0, notes['F7'], notes['G7'],
    0, notes['E7'], 0, notes['C7'],
    notes['D7'], notes['B6'], 0, 0
]
tempo = [
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,

    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,

    9, 9, 9,
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,

    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,

    9, 9, 9,
    12, 12, 12, 12,
    12, 12, 12, 12,
    12, 12, 12, 12,
]


def setup():
    print('Number of arguments:', len(sys.argv), 'arguments.')
    print('Argument List:', str(sys.argv))
    global p_R, p_G, p_B, p, gameStart, gameEnd
    print('Program is starting ... ')
    GPIO.setmode(GPIO.BOARD)       # Numbers GPIOs by physical location
    for i in pins:
        GPIO.setup(pins[i], GPIO.OUT)   # Set pins' mode is output
        GPIO.output(pins[i], GPIO.HIGH)  # Set pins to high(+3.3V) to off led
        #GPIO.output(pins[i], GPIO.LOW)
    p_R = GPIO.PWM(pins['pin_R'], 2000)  # set Frequence to 2KHz
    p_G = GPIO.PWM(pins['pin_G'], 2000)
    p_B = GPIO.PWM(pins['pin_B'], 2000)
    p_R.start(0)      # Initial duty Cycle = 0
    p_G.start(0)
    p_B.start(0)

    GPIO.setup(buttonPinJaune, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Set buttonPin's mode is input, and pull up to high level(3.3V)
    GPIO.setup(buttonPinRouge, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Set buttonPin's mode is input, and pull up to high level(3.3V)
    GPIO.setup(buttonPinVert, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Set buttonPin's mode is input, and pull up to high level(3.3V)
    GPIO.setup(buttonPinBleu, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Set buttonPin's mode is input, and pull up to high level(3.3V)

    GPIO.setup(buzzerPin, GPIO.OUT)   # Set buzzerPin's mode is output

    # p = GPIO.PWM(buzzerPin, 1)
    p = GPIO.PWM(buzzerPin, 440)
    p.start(0)


def setColor(color):
    # print ("color=",color,".")
    if color == 'rouge':
        p_R.ChangeDutyCycle(50)
        p_G.ChangeDutyCycle(100)
        p_B.ChangeDutyCycle(100)
    elif color == 'vert':
        p_R.ChangeDutyCycle(100)
        p_G.ChangeDutyCycle(50)
        p_B.ChangeDutyCycle(100)
    elif color == 'bleu':
        p_R.ChangeDutyCycle(100)
        p_G.ChangeDutyCycle(100)
        p_B.ChangeDutyCycle(50)
    elif color == 'jaune':
        p_R.ChangeDutyCycle(70)
        p_G.ChangeDutyCycle(70)
        p_B.ChangeDutyCycle(100)
    elif color == '':
        p_R.ChangeDutyCycle(100)
        p_G.ChangeDutyCycle(100)
        p_B.ChangeDutyCycle(100)


def alertor():
    p.start(50)
    for x in range(0, 361):  # frequency of the alarm along the sine wave change
        sinVal = math.sin(x * (math.pi / 180.0))  # calculate the sine value
        toneVal = 2000 + sinVal * 500  # Add to the resonant frequency with a Weighted
        p.ChangeFrequency(toneVal)  # output PWM
        time.sleep(0.001)


def redBip():
    p.start(50)
    tab = [480, 500, 520]
    for i in range(0, 1):
        p.ChangeFrequency(tab[i])
        time.sleep(0.02)
    # p.ChangeFrequency(480)
    # time.sleep(0.02)


def greenBip():
    p.start(50)
    tab = [400, 410, 420]
    for i in range(0, 1):
        p.ChangeFrequency(tab[i])
        time.sleep(0.02)
    # p.ChangeFrequency(400)
    # time.sleep(0.02)


def blueBip():
    p.start(50)
    tab = [620, 500, 520]
    for i in range(0, 1):
        p.ChangeFrequency(tab[i])
        time.sleep(0.05)
    # p.ChangeFrequency(620)
    # time.sleep(0.001)


def yelloxBip():
    p.start(20)
    # p.start(50)
    tab = [500, 480, 500]
    for i in range(0, 1):
        p.ChangeFrequency(tab[i])
        time.sleep(0.02)
    # p.ChangeFrequency(500)
    # time.sleep(0.002)


def errorBip():
    p.start(50)
    p.ChangeFrequency(200)
    time.sleep(0.02)
    # p.stop

def succesBip():
    p.start(50)
    p.ChangeFrequency(1800)
    time.sleep(0.2)


def levelBip():
    p.start(50)
    tab = [1200, 1400, 1600, 1800,
           1200, 1400, 1600, 1800,
           1200, 1400, 1600, 1800]
    for i in range(0, 11):
        p.ChangeFrequency(tab[i])
        time.sleep(0.2)


def mario():
    p.start(50)
    print('\n    Playing song 1...')
    for i in range(1, len(sound_mario_1)):  # Play song 1
        p.ChangeFrequency(sound_mario_1[i])  # Change the frequency along the song note
        time.sleep(beat_mario_1[i] * 0.1)  # delay a note for beat * 0.5s
    time.sleep(1)  # Wait a second for next song.


def music():
    p.start(50)
    print('\n    Playing song 1...')
    for i in range(1, len(song_1)):  # Play song 1
        p.ChangeFrequency(song_1[i])  # Change the frequency along the song note
        time.sleep(beat_1[i] * 0.5)  # delay a note for beat * 0.5s
    time.sleep(1)  # Wait a second for next song.

    print('\n\n    Playing song 2...')
    for i in range(1, len(song_2)):  # Play song 1
        p.ChangeFrequency(song_2[i])  # Change the frequency along the song note
        time.sleep(beat_2[i] * 0.5)  # delay a note for beat * 0.5s


def stopAlertor():
    p.stop()


def play(melody, tempo, pause, pace=0.800):
    for i in range(0, len(melody)):  # Play song

        noteDuration = pace / tempo[i]
        buzz(melody[i], noteDuration)  # Change the frequency along the song note

        pauseBetweenNotes = noteDuration * pause
        time.sleep(pauseBetweenNotes)


def buzz(frequency, length):  # create the function "buzz" and feed it the pitch and duration)

    if frequency == 0:
        time.sleep(length)
        return
    period = 1.0 / frequency  # in physics, the period (sec/cyc) is the inverse of the frequency (cyc/sec)
    delayValue = period / 2  # calculate the time for half of the wave
    numCycles = int(length * frequency)  # the number of waves to produce is the duration times the frequency

    for i in range(numCycles):  # start a loop from 0 to the variable "cycles" calculated above
        GPIO.output(buzzerPin, True)  # set pin 27 to high
        time.sleep(delayValue)  # wait with pin 27 high
        GPIO.output(buzzerPin, False)  # set pin 27 to low
        time.sleep(delayValue)  # wait with pin 27 low


def getColorsSequence(difficultyMode, level, life, life_message, speed, timeColor = 0.5, numberElement = 4 ):
    print(timeColor)
    colorSequence = []
    arrayColor = ['rouge', 'vert', 'bleu', 'jaune']
    for i in range(0, numberElement):
        # colorSequence.append(random.randint(1, 4))
        colorSequence.append(random.choice(arrayColor))

    for seq in colorSequence:

        setColor(seq)

        if seq == 'rouge':
            redBip()
        elif seq == 'vert':
            greenBip()
        elif seq == 'bleu':
            blueBip()
        elif seq == 'jaune':
            yelloxBip()

        # time.sleep(0.3)
        time.sleep(timeColor)
        stopAlertor()
        setColor('')
        time.sleep(0.2)

    checkInputColor(difficultyMode, colorSequence, level, life, life_message, speed, timeColor, numberElement)


def checkInputColor(difficultyMode, colorTab, level, life, life_message, speed, timeColor, numberElement):
    print("colorTab", colorTab)
    nbElementColorTab = len(colorTab)
    j = 0
    print("Entrez la bonne combinaison de couleurs :\n")
    while nbElementColorTab != 0:
        # colorInput = input("Entrez la bonne combinaison de couleurs :\r\n")

        if GPIO.input(buttonPinRouge) == GPIO.LOW or GPIO.input(buttonPinVert) == GPIO.LOW or GPIO.input(buttonPinBleu) == GPIO.LOW or GPIO.input(buttonPinJaune) == GPIO.LOW:
            if GPIO.input(buttonPinRouge) == GPIO.LOW:
                colorInput = 'rouge'  # 1
            elif GPIO.input(buttonPinVert) == GPIO.LOW:
                colorInput = 'vert'  # 2
            elif GPIO.input(buttonPinBleu) == GPIO.LOW:
                colorInput = 'bleu'  # 3
            elif GPIO.input(buttonPinJaune) == GPIO.LOW:
                colorInput = 'jaune'  # 4

            if colorTab[j] == colorInput:
                setColor(colorInput)
                succesBip()
                stopAlertor()
                time.sleep(1)
                setColor('')
                time.sleep(0.2)

                nbElementColorTab = nbElementColorTab - 1
                j = j + 1
            else:
                setColor(colorInput)
                errorBip()
                time.sleep(0.2)
                stopAlertor()
                nbElementColorTab = len(colorTab)
                life = life - 1
                # life_message.remove(str('\334'))
                life_message.remove(str('\377'))
                message_life(life_message, level, speed)
                print('recommencer')
                print("Vie(s) restantes : " + str(life))
                time.sleep(1)
                setColor('')
                time.sleep(0.2)

                if life == 0:
                    print('tu as perdu, tu as atteint le niveau : ' + str(level))
                    gameEnd = time.time()
                    durationGame = str(round(gameEnd - gameStart, 2))
                    print('La partie a duré ' + durationGame + 's')
                    pseudo = input("Entrez votre pseudo :\r\n")
                    r = requests.post('http://192.168.1.56/api/leaderboards', data = {'pseudo':pseudo, 'score':level, 'duration':durationGame})
                    break
                j = 0

    if life != 0:
        levelBip()
        time.sleep(0.2)
        stopAlertor()
        nextLevel = level + 1

        if (difficultyMode == "1"):
            if (nextLevel % 10 == 0):
                numberElement = numberElement + 1
                timeColor = 0.5
            else:
                numberElement = numberElement
        elif (difficultyMode == "2"):
            if (nextLevel % 5 == 0):
                timeColor = 0.5
                numberElement = numberElement + 1
            else:
                numberElement = numberElement
                timeColor = timeColor - 0.1
        elif (difficultyMode == "3"):
            numberElement = 3 + nextLevel
            timeColor = 0.3
        elif (difficultyMode == "4"):
            numberElement = 3 + nextLevel
            timeColor = 0.2


        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message(" YOU WIN ")
        lcd.setCursor(0, 1)
        message = "LEVEL "+str(nextLevel)+" SPEED 1"
        lcd.message(message)
        print("\r\nwin, on passe au niveau " + str(nextLevel))
        time.sleep(2)
        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message("TO START : PUSH")
        lcd.setCursor(0, 1)
        lcd.message(" YELLOW BUTTON")

        if difficultyMode != '4':
            while GPIO.input(buttonPinJaune) != GPIO.LOW:
                sleep(0.0001)
        message_life(life_message, nextLevel, speed)
        getColorsSequence(difficultyMode, nextLevel, life, life_message, speed, timeColor, numberElement)


def launchGame(level=1, speed=1):
    life = 10
    difficultyMode = 0

    # mario()
    # heart = [0x0, 0xa, 0x1f, 0x1f, 0xe, 0x4, 0x0]
    # lcd.create_char(0, heart)
    mcp.output(3, 1)  # turn on LCD backlight
    lcd.begin(16, 2)  # set number of LCD lines and columns
    while difficultyMode == 0:
        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break

        lcd.setCursor(0, 0)
        lcd.message("*** KOLORETAKO ***\n")
        lcd.message(" WELCOME TO OUR GAME")
        sleep(1)
        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break

        for i in range(0, 20):
            lcd.DisplayLeft()
            sleep(0.25)
        # lcd.message('\x00')
        # lcd.heart()

        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break
        sleep(1)
        # lcd.scrollDisplayRight()
        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message(" PLAY EASY MODE ")
        lcd.setCursor(0, 1)
        lcd.message("PUSH BLUE BUTTON")

        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break

        sleep(1)
        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message("PLAY NORMAL MODE")
        lcd.setCursor(0, 1)
        lcd.message("PUSH GREEN BTN  ")

        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break
        sleep(1)
        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message(" PLAY HARD MODE ")
        lcd.setCursor(0, 1)
        lcd.message("PUSH YELLOW BTN ")

        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break
        sleep(1)
        lcd.clear()
        lcd.setCursor(0, 0)
        lcd.message("YOU'R A LEGEND ?")
        lcd.setCursor(0, 1)
        lcd.message("PUSH RED BUTTON ")

        if GPIO.input(buttonPinBleu) == GPIO.LOW:
            difficultyMode = '1'
            break
        elif GPIO.input(buttonPinVert) == GPIO.LOW:
            difficultyMode = '2'
            break
        elif GPIO.input(buttonPinJaune) == GPIO.LOW:
            difficultyMode = '3'
            break
        elif GPIO.input(buttonPinRouge) == GPIO.LOW:
            difficultyMode = '4'
            break

    # while difficultyMode == 0:
    #     sleep(0.001)
        # if GPIO.input(buttonPinBleu) == GPIO.LOW:
        #     difficultyMode = '1'
        # elif GPIO.input(buttonPinVert) == GPIO.LOW:
        #     difficultyMode = '2'
        # elif GPIO.input(buttonPinJaune) == GPIO.LOW:
        #     difficultyMode = '3'
        # elif GPIO.input(buttonPinRouge) == GPIO.LOW:
        #     difficultyMode = '4'

    print(difficultyMode)

    stopAlertor()
    # life_message = [str('\334'), str('\334'), str('\334'), str('\334'), str('\334'), str('\334'), str('\334'),
    #                 str('\334'), str('\334'), str('\334')]
    life_message = [str('\377'), str('\377'), str('\377'), str('\377'), str('\377'), str('\377'), str('\377'),
                    str('\377'), str('\377'), str('\377')]

    message_life(life_message, level, speed)

    if (difficultyMode == "3"):
        timeColor = 0.3
    elif (difficultyMode == "4"):
        timeColor = 0.2
    else:
        timeColor = 0.5

    getColorsSequence(difficultyMode, level, life, life_message, speed, timeColor)


def message_life(life_message, level, speed):
    lcd.clear()
    lcd.setCursor(0, 0)  # set cursor position
    #  lcd.message("** GAME STARTED **")
    lcd.message("LIFE ")
    for i in life_message:
        lcd.message(i)  # display life

    lcd.setCursor(0, 1)
    lcd.message("LEVEL " + str(level) + "  SPEED " + str(speed))
    print('Niveau ' + str(level))


def loop():
    mcp.output(3, 1)  # turn on LCD backlight
    lcd.begin(16, 2)  # set number of LCD lines and columns
    level = 4
    lifeMessage = 'OOOOOOOOOO'
    lifeCount = 10

    lcd.setCursor(0, 0)  # set cursor position
    lcd.message('\99 KOLORETAKO ♡\n')  # display message
    # lcd.message('Level' + str(level-4))  # display level
    lcd.message('\u2661')
    print('\u2661')
    sleep(1)

    # print("Super Mario Theme")
    # play(melody, tempo, 1.3, 0.800)
    # time.sleep(2)

    while True:

        sequence = []
        time.sleep(2)
        lcd.setCursor(0, 0)  # set cursor position
        lcd.message(lifeMessage)
        lcd.setCursor(0, 1)  # set cursor position
        lcd.message('START')

        for i in range(0,level):
            sequence.append(random.randint(1, 4))

        for seq in sequence:
            if seq == 'rouge':
                redBip()
            elif seq == 'vert':
                greenBip()
            elif seq == 'bleu':
                blueBip()
            elif seq == 'jaune':
                yelloxBip()
            setColor(seq)
            time.sleep(0.3)
            stopAlertor()
            setColor('')
            time.sleep(0.2)

        lcd.setCursor(0, 1)  # set cursor position
        lcd.message('YOUR TURN')

        userSequence = []
        print('sequence jeu ', sequence)
        while len(userSequence)<level:
            if GPIO.input(buttonPinJaune) == GPIO.LOW:
                userSequence.append(4)
                setColor(4)
                print('sequence value: ', sequence[len(userSequence) - 1])
                if sequence[len(userSequence)-1] != 4:
                    print('error')
                    errorBip()
                    time.sleep(0.2)
                    stopAlertor()
                    lcd.clear()
                    lifeMessage = lifeMessage[:len(lifeMessage) - 1]
                    lcd.setCursor(0, 0)  # set cursor position
                    lcd.message(lifeMessage)
                else:
                    succesBip()
                    stopAlertor()
                time.sleep(1)
                setColor('')
                time.sleep(0.2)
            elif GPIO.input(buttonPinRouge) == GPIO.LOW:
                userSequence.append(1)
                setColor(1)
                print('sequence value: ', sequence[len(userSequence) - 1])
                if sequence[len(userSequence)-1] != 1:
                    lcd.clear()
                    lifeMessage = lifeMessage[:len(lifeMessage)-1]
                    lcd.setCursor(0, 0)  # set cursor position
                    lcd.message(lifeMessage)
                    errorBip()
                    time.sleep(0.2)
                    stopAlertor()
                else:
                    succesBip()
                    stopAlertor()
                time.sleep(1)
                setColor('')
                time.sleep(0.2)
            elif GPIO.input(buttonPinVert) == GPIO.LOW:
                userSequence.append(2)
                setColor(2)
                print('sequence value: ', sequence[len(userSequence) - 1])
                if sequence[len(userSequence)-1] != 2:
                    print('error')
                    errorBip()
                    time.sleep(0.2)
                    stopAlertor()
                    lcd.clear()
                    lifeMessage = lifeMessage[:len(lifeMessage) - 1]
                    lcd.setCursor(0, 0)  # set cursor position
                    lcd.message(lifeMessage)
                else:
                    succesBip()
                    stopAlertor()
                time.sleep(1)
                setColor('')
                time.sleep(0.2)
            elif GPIO.input(buttonPinBleu) == GPIO.LOW:
                userSequence.append(3)
                setColor(3)
                print('sequence value: ', sequence[len(userSequence) - 1])
                if sequence[len(userSequence)-1] != 3:
                    print('error')
                    errorBip()
                    time.sleep(0.2)
                    stopAlertor()
                    lcd.clear()
                    lifeMessage = lifeMessage[:len(lifeMessage) - 1]
                    lcd.setCursor(0, 0)  # set cursor position
                    lcd.message(lifeMessage)
                else:
                    succesBip()
                    stopAlertor()
                time.sleep(1)
                setColor('')
                time.sleep(0.2)

        print('sequence jeu ', sequence)
        print('sequence utilisateur ', userSequence)

        temp = [i for i, j in zip(sequence, userSequence) if i == j]

        if len(temp) != level:
            print("Game Over")
            lcd.setCursor(0, 1)  # set cursor position
            lcd.message('GAME OVER ')
            sleep(3)
            break
        else:
            levelBip()
            time.sleep(0.2)
            stopAlertor()
            level += 1
            lcd.setCursor(0, 1)  # set cursor position
            lcd.message('Level ' + str(level - 4))
            sleep(1)

    destroy()


def destroy():
    GPIO.output(buzzerPin, GPIO.LOW)  # buzzer off
    p_R.stop()
    p_G.stop()
    p_B.stop(),
    for i in pins:
        GPIO.output(pins[i], GPIO.HIGH)
    GPIO.cleanup()
    lcd.clear()
    mcp.output(3, 0)  # turn off LCD backlight


PCF8574_address = 0x27  # I2C address of the PCF8574 chip.
PCF8574A_address = 0x3F  # I2C address of the PCF8574A chip.
# Create PCF8574 GPIO adapter.
try:
    mcp = PCF8574_GPIO(PCF8574_address)
except:
    try:
        mcp = PCF8574_GPIO(PCF8574A_address)
    except:
        print('I2C Address Error !')
        exit(1)

# Create LCD, passing in MCP GPIO adapter.
lcd = Adafruit_CharLCD(pin_rs=0, pin_e=2, pins_db=[4, 5, 6, 7], GPIO=mcp)

if __name__ == '__main__':     # Program start from here
    setup()
    try:
        # loop()
        gameStart = time.time()
        launchGame()
        destroy()
    # except (RuntimeError, TypeError, NameError):
    #     print(RuntimeError)
    #     print(TypeError)
    #     print(NameError)
    #     destroy()
    except KeyboardInterrupt:  # When 'Ctrl+C' is pressed, the child program destroy() will be  executed.
        destroy()
