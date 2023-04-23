"use strict"


//Boton para cambiar el layout de la imagenes en versión movil
$('#displayBtn').click(changeDisplay)

let position = 'initial'

function changeDisplay(){
    let layout = $('#layout')
    let clothesDiv = $('.gclothesDiv')
    let clothesImg = $('.clothesImg')


    if (position === 'initial'){
        layout.animate({left: '102px'}, 500)
        position = 'moved'

        //Cambio de clases
        clothesDiv.each(function(){
            $(this).removeClass('w-[360px]')
            $(this).addClass('w-[160px]')
        })
        
        clothesImg.each(function() {
            $(this).removeClass('h-[500px]')
            $(this).addClass('h-[250px]')
        })
    }else{
        layout.animate({left: '17px'}, 500)
        position = 'initial'

        //Cambio de clases
        clothesDiv.each(function(){
            $(this).removeClass('w-[160px]')
            $(this).addClass('w-[360px]')
        })

        clothesImg.each(function() {
            $(this).removeClass('h-[250px]')
            $(this).addClass('h-[500px]')
        })
    }
    console.log(position)
}