"use strict"

let filterBtn = $('#filterSortBtn')
let filterDiv = $('#filterSortDiv')
let backgroundBlur = $('#backgroundBlur')

filterBtn.click(function () { 
    filterDiv.removeClass('hidden')
    backgroundBlur.removeClass('hidden')

    filterDiv.animate({
        left: $(window).width()/1.5+'px'
    }, 500)
});

backgroundBlur.click(closeFilters)

$('#closeFiltersBtn').click(closeFilters)

//funcion para cerrar el div de los filtros
function closeFilters(){
    filterDiv.addClass('hidden')
    backgroundBlur.addClass('hidden')
    filterDiv.animate({
        left: '2000px'
    }, 500)
}