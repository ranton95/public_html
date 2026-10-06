# Fahrradverleih Projekt

Dieses Verzeichnis ist für die Nutzung mit phpMyAdmin bzw. einem lokalen Webserver vorbereitet.

## 1) Datenbank importieren

1. Öffne phpMyAdmin.
2. Erstelle eine neue Datenbank mit dem Namen `fahrradverleih`.
3. Wähle diese Datenbank aus.
4. Klicke auf `Import` und lade die Datei `fahrradverleih.sql` hoch.
5. Starte den Import.

Die Datei enthält die Struktur der Tabelle `fahrraeder` und Beispiel-Datensätze.

## 2) Beispielabfragen

```sql
SELECT * FROM fahrraeder;
```

```sql
INSERT INTO fahrraeder (rahmenNr, tagesmietpreis, anschaffungsdatum, artikelNr)
VALUES ('AB-1234', 12.50, '2026-10-06', 999);
```

## 3) Lokaler Test

Mit XAMPP/WAMP/MAMP kann man den Ordner direkt im Webroot ablegen und anschließend im Browser öffnen:

- `http://localhost/26-10-OCT/ros/fahrrad/`

Die Datei `index.php` enthält ein kleines Formular zum Speichern eines neuen Fahrrads in der Datenbank.

## 4) Hinweis

Der Standardzugang auf dem lokalen Host ist in `config.php` auf `root` mit leerem Passwort gesetzt. Falls bei dir ein eigenes Passwort verwendet wird, passe die Werte in `config.php` entsprechend an.
