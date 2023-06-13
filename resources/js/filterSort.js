"use strict";
import { closeFilters } from "./slider.js";

export function checkColor(){
    $(".colorCheckbox").each(function () {
        let input = $(this).find("input").eq(0);
        let svg = $(this).find("svg").eq(0);
        let label = $(this).find("label").eq(0);
        if (!input.hasClass("noChecked")) {
            svg.addClass("hidden");
            input.addClass("noChecked");
        }
    });
}

$(".checkbox").each(function () {
    let input = $(this).find("input").eq(0);
    let label = $(this).find("label").eq(0);
    label.click(function () {
        if (input.hasClass("noChecked")) {
            input.removeClass("noChecked");
            label.addClass(["bg-black", "text-white"]);
        } else {
            label.removeClass(["bg-black", "text-white"]);
            input.addClass("noChecked");
        }
    });
});
$(".colorCheckbox").each(function () {
    let input = $(this).find("input").eq(0);
    let svg = $(this).find("svg").eq(0);
    let label = $(this).find("label").eq(0);
    label.click(function () {
        if (input.hasClass("noChecked")) {
            input.removeClass("noChecked");
            svg.removeClass("hidden");
        } else {
            svg.addClass("hidden");
            input.addClass("noChecked");
        }
    });
});

//Slider de precios usando la libreria uiSlider
let minPrice = document.getElementById("min-price");
let maxPrice = document.getElementById("max-price");

let slider = document.getElementById("slider");
noUiSlider.create(slider, {
    start: [0, 100],
    connect: true,
    range: {
        min: 0,
        max: 100,
    },
    format: {
        to: function (value) {
            return Math.round(value);
        },
        from: function (value) {
            return parseInt(value);
        },
    },
});

//Actualiza los valores de los precios mínimo y máximo cuando cambia el slider
slider.noUiSlider.on("update", function (values, handle) {
    if (handle === 0) {
        minPrice.textContent = values[0] + "€";
    }
    if (handle === 1) {
        maxPrice.textContent = values[1] + "€";
    }
});

let token = $('meta[name="csrf-token"]').attr("content");
$("#removeFilters").click(function () {
    $('input[name="sort"][value="default"]').prop('checked', true);
    $('input[type="checkbox"]').prop("checked", false);
    slider.noUiSlider.set([0, 100])
    $(".checkbox").each(function () {
        let input = $(this).find("input").eq(0);
        let label = $(this).find("label").eq(0);
        if (!input.hasClass("noChecked")) {
            label.removeClass(["bg-black", "text-white"]);
            input.addClass("noChecked");
        }
    });
    checkColor()
});

$("#filterBtn").click(function () {
    let sort = $('input[name="sort"]:checked').val();
    let typeProduct = [];
    fillData(typeProduct, "typeProduct");
    let sizes = [];
    fillData(sizes, "sizes");
    let discount = [];
    fillData(discount, "discount");
    let price = [];
    fillData(price, "price");
    let color = [];
    fillData(color, "color");

    let gender = $(this).attr("value").charAt(0);
    $.ajax({
        url: "/filter/" + gender + "/" + sort,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": token, // Agregar el token CSRF como un encabezado personalizado
        },
        data: {
            sort: sort,
            typeProduct: typeProduct,
            sizes: sizes,
            discount: discount,
            price: price,
            color: color,
            minPrice: parseInt(minPrice.textContent.slice(0, -1)),
            maxPrice: parseInt(maxPrice.textContent.slice(0, -1)),
        },
        success: function (response) {
            $("#clothesContainer").html(response);
            let totalClothes = 0
            $(".clothes").each(function(index){
                totalClothes = index + 1;
            })
            $("#totalProducts").text(totalClothes + " productos")
            closeFilters();
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        },
    });
});

function fillData(array, name) {
    $('input[name="' + name + '"]:checked').each(function () {
        array.push($(this).val());
    });
    return array;
}


