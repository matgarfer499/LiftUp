let likeBtn = $(".likeBtn");
//Cambiar el color del corazon al usuario cuando da like a una ropa o lo quita
function changeHeartColor(btn) {
    let svg = btn.children[0];
    let fill = svg.getAttribute("fill");
    if (fill == "black") {
        svg.setAttribute("fill", "none");
    } else {
        svg.setAttribute("fill", "black");
    }
}
function addToWishlist(id, btn) {
    let idClo = id;
    let token = $('meta[name="csrf-token"]').attr("content");
    let clickedBtn = btn;
    if (isAuthenticated) {
        $.ajax({
            url: "/wishlist/add",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": token, // Agregar el token CSRF como un encabezado personalizado
            },
            data: { idClo: idClo },
            success: function (response) {
                changeHeartColor(clickedBtn);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    } else {
        window.location.href = "/login";
    }
}
