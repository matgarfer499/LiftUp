"use strict";

let $searchBar = $("#searchBar");
let $searchInput = $("#searchInput");

$searchBar.on("click", function () {
    $searchInput.removeClass("opacity-0 pointer-events-none");
    $searchInput.addClass("opacity-100 transition duration-500 ease-in-out active");
});

$(document).on("click", function (event) {
    // Comprobar si se hizo clic fuera del elemento específico
    if ($searchInput.hasClass("active") && !$(event.target).closest("#searchBar").length && !$(event.target).closest("#searchInput").length) {
        $searchInput.removeClass("opacity-100 active");
        $searchInput.addClass("opacity-0 pointer-events-none");
    }
});

let token = $('meta[name="csrf-token"]').attr("content");
$searchInput.on("input", function (event) {
    event.preventDefault();
    if ($searchInput.val().trim() === "") {
        return;
    }else{
        let gender = $("input").attr("name").charAt(0);
        $.ajax({
            url:  gender + "/" + $searchInput.val(),
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": token, // Agregar el token CSRF como un encabezado personalizado
            },
            data: {
                search: $searchInput.val(),
                gender: gender,
            },
            success: function (response) {
                $("#clothesContainer").html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    }
});
