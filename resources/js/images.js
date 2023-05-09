"use strict"

//Cambiar el + por un - y viceversa al desplegar los materiales de la ropa

materialsDisplay.addEventListener("click", function(){
    if(moreLess.textContent == "+"){
        moreLess.textContent = "-";
    } else {
        moreLess.textContent = "+";
    }
});