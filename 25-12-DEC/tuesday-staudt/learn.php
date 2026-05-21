<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO SQL Schritte</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: nowrap;
        }

        .step {
            background-color: white;
            padding: 20px;
            width: 170px;
            border: 2px solid #ccc;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .step:hover {
            background-color: #e5f4ff;
        }

        .info-box {
            background-color: white;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 60%;
            margin: 40px auto 0 auto;
            display: none;
        }

        .code-snippet {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            text-align: left;
            white-space: pre-wrap;
            font-family: monospace;
        }
    </style>
</head>
<body>

    <h1>PDO - Grundlegende SQL-Kommandos</h1>

    <div class="container">

        <div class="step" data-step="tryCatch">
            <h2>try catch</h2>
            <p>besseres finden von Fehlern</p>
        </div>

        <div class="step" data-step="connect">
            <h2>PDO verbinden</h2>
            <p>Datenbank verbinden</p>
        </div>

        <div class="step" data-step="create">
            <h2>CREATE TABLE</h2>
            <p>Tabelle anlegen</p>
        </div>

        <div class="step" data-step="insert">
            <h2>INSERT</h2>
            <p>Daten einfügen</p>
        </div>

        <div class="step" data-step="select">
            <h2>SELECT</h2>
            <p>Daten lesen</p>
        </div>

        <div class="step" data-step="delete">
            <h2>DELETE</h2>
            <p>Daten löschen</p>
        </div>

    </div>

    <div id="info-box" class="info-box">
        <h2 id="info-title"></h2>
        <p id="info-text"></p>
        <pre id="code-snippet" class="code-snippet"></pre>
    </div>

    <script>
        const steps = {

            tryCatch: {
                title:"try{}catch{}",
                desc:"Benutze try und catch um Fehler besser erkennen zu können",
                code:`try{\n$pdo = new PDO("mysql:host=localhost;dbname=testdb","root","");\n}catch(PDOException $e){\necho $e->getMessage();\n}`
            },

            connect: {
                title: "PDO Verbindung",
                desc: "So stellst du eine einfache Verbindung zu MySQL her.",
                code: `Wenn die Datenbank bereits existiert:\n\n<?php\n$pdo = new PDO("mysql:host=localhost;dbname=testdb", "root", "");\necho "Verbindung erfolgreich!";\n?>\n\nWenn die Datenbank noch nicht exisitert:\n\n<?php\n$pdo = new PDO("mysql:host=localhost", "root", "");\n$pdo->exec("CREATE DATABASE IF NOT EXISTS testdb");\n$pdo = new PDO("mysql:host=localhost;dbname=testdb","root","");\n?>\n?>`
            },

            create: {
                title: "CREATE TABLE",
                desc: "Eine neue Tabelle namens 'users' erstellen.",
                code: `<?php\n$sql = "CREATE TABLE users (\n    id INT AUTO_INCREMENT PRIMARY KEY,\n    username VARCHAR(50),\n    email VARCHAR(100)\n)";\n$pdo->exec($sql);\necho "Tabelle 'users' wurde erstellt!";\n?>`
            },

            insert: {
                title: "INSERT",
                desc: "Einen Datensatz in die Tabelle einfügen.",
                code: `<?php\n $sql = "INSERT INTO person VALUES (\n           'value1'\n           'value2';\n           .....\n       );\n";\n$pdo->exec($sql)\n?>`
            },

            select: {
                title: "SELECT",
                desc: "Daten aus der Tabelle auslesen.",
                code: `<?php\n $sql = "SELECT * FROM users";\n $result = $pdo->query($sql);\n\n$valuesArray=$values->fetchAll();\necho"<pre>";\nprint_r($valluesArray);\necho"</pre>"; "<br>";\n}\n?>`
            },

            delete: {
                title: "DELETE",
                desc: "Ein Benutzer wird gelöscht (hier: ID = 1).",
                code: `<?php\n $sql = "DELETE FROM users WHERE id = 1";\n $pdo->exec($sql);\necho "Benutzer mit ID 1 gelöscht!";\n?>`
            }
        };

        document.querySelectorAll(".step").forEach(box => {
            box.addEventListener("click", () => {
                const key = box.dataset.step;

                document.getElementById("info-title").textContent = steps[key].title;
                document.getElementById("info-text").textContent = steps[key].desc;
                document.getElementById("code-snippet").textContent = steps[key].code;

                document.getElementById("info-box").style.display = "block";
            });
        });
    </script>

</body>
</html>
