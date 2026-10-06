import mysql.connector
from datetime import date




rahmenNr = input("Rahmennummer eingeben (1 bis 6 Zeichen): ")
while len(rahmenNr) < 1 or len(rahmenNr) > 6:
    print("Die Rahmennummer muss zwischen 1 und 6 Zeichen lang sein.")
    rahmenNr = input("Rahmennummer eingeben (1 bis 6 Zeichen): ")

tagesmietpreis = input("Tagesmietpreis eingeben: ")
tagesmietpreis = float(tagesmietpreis.replace(",", "."))

jahr = int(input("Anschaffungsjahr eingeben: "))
monat = int(input("Anschaffungsmonat eingeben: "))
tag = int(input("Anschaffungstag eingeben: "))
anschaffungsdatum = date(jahr, monat, tag)

artikelNr = int(input("Artikelnummer eingeben: "))

connection = mysql.connector.connect(
    host="localhost",
    user="phpmyadmin",
    password="server",
    database="fahrradverleih",
)

cursor = connection.cursor()

sql = """INSERT INTO fahrraeder
    (rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr)
VALUES (%s, %s, %s, %s);"""
daten = (rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr)
cursor.execute(sql, daten)

connection.commit()
cursor.close()
connection.close()
print("Fahrrad gespeichert.")