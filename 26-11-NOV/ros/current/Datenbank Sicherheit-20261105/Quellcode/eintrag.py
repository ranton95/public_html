import mysql.connector

db = mysql.connector.connect(host="localhost", user="root", password="", database="shop")

bez = input("Bezeichnung: ")
einkauf = input("Einkaufspreis: ")
verkauf = input("Verkaufspreis: ")

sqlab = f"insert into artikel values (NULL,'{bez}', {einkauf},{verkauf});"
statement = db.cursor()

num = 0
try:
    for ergebnis in statement.execute(sqlab, multi=True):
        num = ergebnis.rowcount
    db.commit()
except:
    pass

if num > 0:
    print(f"{num} Datensatz wurde erfolgreich eingefügt")
else:
    print("Es ist ein Fehler aufgetreten.")
