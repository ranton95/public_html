

const feld = document.getElementById("name");

feld.addEventListener("input", function(){

    if(feld.ariaValueMax.length >4){
        feld.style.backgroundColor="green";
    }
    else{
        feld.style.backgroundColor="red";
    }
});