"use strict"

//Cambiar el + por un - y viceversa al desplegar los materiales de la ropa

materialsDisplay.addEventListener("click", function(){
    if(moreLess.textContent == "+"){
        moreLess.textContent = "-";
    } else {
        moreLess.textContent = "+";
    }
});

//Seleccionar imagenes y que se desplacen a la imagen seleccionada

const imgContainers = document.querySelectorAll('.imgContainer');
const imgSelector = document.querySelectorAll(".imgSelector");

imgSelector.forEach(function(btn){
    btn.addEventListener('click', function(event){
        event.preventDefault();
        const index = parseInt(this.getAttribute('data-index'));
        const scrollContainer = imgContainers[index];

        const containerOffsetTop = scrollContainer.offsetTop;

        scrollContainer.parentElement.scrollTo({
            top: containerOffsetTop,
            behavior: "smooth",
        });
    });
});
