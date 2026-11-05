import mysql.connector

db = mysql.connector.connect(host="localhost", user="root", password="", database="shop")

artikel = input("Artikel: ")

abfrage = f"Select Bezeichnung, Verkaufspreis from artikel where Bezeichnung= '{artikel}'"
statement = db.cursor(dictionary=True)
statement.execute(abfrage)

for daten in statement.fetchall():
    print(f"Artikelbezeichnung: {daten['Bezeichnung']}")
    print(f"Preis: {daten['Verkaufspreis']}")
