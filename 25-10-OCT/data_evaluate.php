<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
ini_set("display_errors", "on");

// file: data_evaluate.php   



// required fields 
if( empty($_REQUEST['lastname']) || 
    empty($_REQUEST['password']) || 
    empty($_REQUEST['email'])) {
    echo "<p>All required fields must be filled in</p>";
}  
else { 

    // required fields 
    $lastname = $_REQUEST['lastname'];
    $country = $_REQUEST['country'];
    $email = $_REQUEST['email'];
    $favs = $_REQUEST['favs'];
  
    
    // optional fields
    $firstname = empty($_REQUEST['firstname']) ?  "n.a." : $_REQUEST['firstname']; 
    $dob = empty($_REQUEST['dob']) ?  "n.a." : $_REQUEST['dob']; 
       

    echo "<h2>Your data:</h2>"; 
    echo "<p>";
    echo "<strong>First Name:</strong> $firstname<br>";
    echo "<strong>Last Name:</strong> $lastname<br>";
    echo "<strong>Email:</strong> $email<br>";
    echo "<strong>Country:</strong> $country<br>";
    echo "<strong>Date Of Birth:</strong> $dob<br>";
    echo "<strong>Favorites:</strong><br>";
 
    if(!empty($_REQUEST["favs"]) && is_array($_REQUEST["favs"])) {
         echo "<ul>";
         $favs = $_REQUEST["favs"];
         foreach($favs as $fav) {
             echo "<li>$fav</li>";
         } 
         echo "</ul>";

    } 
    else {
        echo "n.a<br>";
    /*
     echo "<pre>";
    print_r($favs);
    echo "</pre>";
    */
    //echo "<strong>Favorites:</strong> $favs<br>";
    echo "</p>";
    }
}
?>
    
</body>
</html>