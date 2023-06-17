"use strict";

let bagBtn = $("#bag");
let bagDiv = $("#bagDiv");
let backgroundBlur = $("#backgroundBlur");

bagBtn.click(function () {
    backgroundBlur.removeClass("hidden");
    $("body").css("overflow", "hidden");
    bagDiv.animate(
        {
            right: 0,
        },
        500
    );
});

backgroundBlur.click(closeFilters);

$("#closeBagBtn").click(closeFilters);

//funcion para cerrar el div de los filtros
export function closeFilters() {
    backgroundBlur.delay(400).queue(function (next) {
        $(this).addClass("hidden");
        next();
    });
    bagDiv.animate(
        {
            right: "-2000px",
        },
        500
    );
    $("body").css("overflow", "visible");
}

//Eliminar ropa de la bolsa

$(".deleteFromBag").each(function(){
    $(this).on("click", function() {
        addDeleteBag($(this).val());
        $(this).closest(".clothesBag").remove();
    });
});

$(".addToBag").each(function(){
    $(this).on("click", function() {
        addDeleteBag($(this).val());
    });
});

function addDeleteBag(id) {
    let idClo = id;
    let token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: "/clothes/bag/delete",
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": token, // Agregar el token CSRF como un encabezado personalizado
        },
        data: { idClo: idClo },
        success: function (response) {
            console.log("ropa eliminada");
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        },
    });
}
