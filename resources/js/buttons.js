"use strict"


//Boton para cambiar el layout de la imagenes en versión movil
$('#displayBtn').click(changeDisplay)

let position = 'initial'

function changeDisplay(){
    let layout = $('#layout')
    let clothesDiv = $('.clothesDiv')
    let clothesImg = $('.clothesImg')


    if (position === 'initial'){
        layout.animate({left: '96px'}, 500)
        position = 'moved'

        //Cambio de clases
        clothesDiv.each(function(){
            $(this).removeClass('w-full')
            $(this).addClass('w-5/12')
        })
        
        clothesImg.each(function() {
            $(this).removeClass('h-full')
            $(this).addClass('h-[250px]')
        })
    }else{
        layout.animate({left: '23px'}, 500)
        position = 'initial'

        //Cambio de clases
        clothesDiv.each(function(){
            $(this).removeClass('w-5/12')
            $(this).addClass('w-full')
        })

        clothesImg.each(function() {
            $(this).removeClass('h-[250px]')
            $(this).addClass('h-full')
        })
    }
}

//Cambiar el color del corazon al usuario cuando da like a una ropa o lo quita
let likeBtn = $(".likeBtn");

likeBtn.each(function(){
    $(this).click(function(){
        let svg = $(this).children("svg");
        let fill = svg.attr("fill");

        if(fill == "black"){
            svg.attr("fill", "none");
        }else{
            svg.attr("fill", "black");
        }
    });
});