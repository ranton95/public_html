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
VALUES (%s, %s, %s, %s);"""
values = ("AB1234", 12.50, "2026-09-08", 123)
cursor.execute(sql, values)
connection.commit()
cursor.close()
connection.close()
print("Datensatz gespeichert.")
