import mysql.connector
from datetime import date
connection = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="fahrradverleih",
)
cursor = connection.cursor()
sql = """INSERT INTO fahrraeder(rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr)
VALUES ("AB1234", 12.50, "2026-9-8",123);"""
cursor.execute(sql)
connection.commit()
cursor.close()
connection.close()
print("Datensatz gespeichert.")