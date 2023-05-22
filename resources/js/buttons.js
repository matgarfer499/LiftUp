"use strict"


//Boton para cambiar el layout de la imagenes en versión movil
$('#displayBtn').click(changeDisplay)

let position = 'initial'
let clothesContainer = $('#clothesContainer')
let layout = $('#layout')

function changeDisplay(){
    let btnWidth = $('#displayBtn').width()

    if (position === 'initial'){
        layout.animate({left: btnWidth/1.8+'px'}, 500)
        position = 'moved'

        //Cambio de clases
        clothesContainer.removeClass('grid-cols-auto-fit-minmax')
        clothesContainer.addClass('grid-cols-2')
    }else{
        backToPosition()

        //Cambio de clases
        clothesContainer.removeClass('grid-cols-2')
        clothesContainer.addClass('grid-cols-auto-fit-minmax')
    }

}
//Si la pantalla es mayor a 600px y el grid sigue en 2 columnas, volvemos a ponerlo en auto
$(window).resize(function(){
    if($(window).width() > 600 && clothesContainer.hasClass('grid-cols-2')){
        clothesContainer.addClass('grid-cols-auto-fit-minmax')
        clothesContainer.removeClass('grid-cols-2')

        backToPosition()
    }
})

//funcion para hacer que el layout vuelva a su posicion inical
function backToPosition(){
    layout.animate({left: '8px'}, 500)
    position = 'initial'
}

let likeBtn = $(".likeBtn");
//Cambiar el color del corazon al usuario cuando da like a una ropa o lo quita
function changeHeartColor(btn){
    let svg = btn.children("svg");
    let fill = svg.attr("fill");
    if(fill == "black"){
        svg.attr("fill", "none");
    }else{
       svg.attr("fill", "black");
    }
}
//Request ajax para enviar los datos a la bd sin recargar la pagina
$(document).ready(function(){
    likeBtn.each(function(){
        $(this).click(function(){
            let idClo = $(this).data('clo');
            let token = $('meta[name="csrf-token"]').attr('content');
            let clickedBtn = $(this);
            if(isAuthenticated){
                $.ajax({
                    url: "/wishlist/add",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': token // Agregar el token CSRF como un encabezado personalizado
                    },
                    data: {idClo: idClo},
                    success: function(response){
                        changeHeartColor(clickedBtn);
                    },
                    error: function(xhr, status, error){
                        console.log(xhr.responseText);
                    }
                });
            }else{
                window.location.href = '/login';
            }
            });
    });
});