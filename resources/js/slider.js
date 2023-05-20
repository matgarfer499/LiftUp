"use strict"

let filterBtn = $('#filterSortBtn')
let filterDiv = $('#filterSortDiv')
let backgroundBlur = $('#backgroundBlur')

filterBtn.click(function () {
    backgroundBlur.removeClass('hidden')

    filterDiv.animate({
        left: $(window).width()/1.5+'px'
    }, 500)
});

backgroundBlur.click(closeFilters)

$('#closeFiltersBtn').click(closeFilters)

//funcion para cerrar el div de los filtros
function closeFilters(){
    backgroundBlur.delay(400).queue(function(next){
        $(this).addClass('hidden')
        next()
    })
    filterDiv.animate({
        left: '2000px'
    }, 500)
}