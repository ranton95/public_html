<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
    $pdo = new PDO(dsn: "mysql:host=localhost; dbname=person", username: "phpmyadmin", password: "server");
    echo "Verbindung erfolgreich!";



    ?>php<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
      
    $conn = new PDO(dsn: "mysql:host=localhost; dbname=e1fi2", username: "phpmyadmin", password: "server");
    echo "Verbindung erfolgreich!";

    $sql = "SELECT * 
            FROM Mitarbeiter";
    
    $result = $conn->query($sql);
    
    $row = $result->fetch();
    echo "</br>";
    echo "</br>"."Total zeilen: ".$result->rowCount()."</br>";
    echo "</br>";

    $output = json_encode($row, JSON_PRETTY_PRINT);
    

    echo $output;




    

    ?>

</body>
</html>

</body>
</html>