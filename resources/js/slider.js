"use strict"

let filterBtn = $('#filterSortBtn')
let filterDiv = $('#filterSortDiv')
let backgroundBlur = $('#backgroundBlur')

filterBtn.click(function () {
    backgroundBlur.removeClass('hidden')
    $('body').css('overflow', 'hidden')
    filterDiv.animate({
        right: 0,
    }, 500)
});

backgroundBlur.click(closeFilters)

$('#closeFiltersBtn').click(closeFilters)

//funcion para cerrar el div de los filtros
export function closeFilters(){
    backgroundBlur.delay(400).queue(function(next){
        $(this).addClass('hidden')
        next()
    })
    filterDiv.animate({
        right: '-2000px'
    }, 500)
    $('body').css('overflow', 'visible')
}