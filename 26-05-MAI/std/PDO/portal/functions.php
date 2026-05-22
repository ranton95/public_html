<?php
function checkPasswordStrength(string $password): bool {
    $strength = 0;

    //check length
    $length = strlen($password);
    if($length >= 8) $strength++;
   
    //check if caps 
    if(preg_match('/[A-Z]/', $password)) $strength++;

    //check if lower cases 
    if(preg_match('/[a-z]/', $password)) $strength++;

    //check if numbers 
    if(preg_match('/[0-9]/', $password)) $strength++;

    //check if spec. chars 
    if(preg_match('/[^a-zA-Z0-9]/', $password)) $strength++;

    return($strength >= 5);   

}

function isValidEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}