//Button that change the layout of the clothes
$("#displayBtn").click(changeDisplay);

let position = "initial";
let clothesContainer = $("#clothesContainer");
let layout = $("#layout");

function changeDisplay() {
    let btnWidth = $("#displayBtn").width();

    if (position === "initial") {
        layout.animate({ left: btnWidth / 1.8 + "px" }, 500);
        position = "moved";

        //Change the classes
        clothesContainer.removeClass("grid-cols-auto-fit-minmax");
        clothesContainer.addClass("grid-cols-2");
    } else {
        backToPosition();

        //Change the classes
        clothesContainer.removeClass("grid-cols-2");
        clothesContainer.addClass("grid-cols-auto-fit-minmax");
    }
}
//If the window width is above 600px and the grid have 2 columns, we put again the grid auto
$(window).resize(function () {
    if ($(window).width() > 600 && clothesContainer.hasClass("grid-cols-2")) {
        clothesContainer.addClass("grid-cols-auto-fit-minmax");
        clothesContainer.removeClass("grid-cols-2");

        backToPosition();
    }
});

//put the layaout in his original position
function backToPosition() {
    layout.animate({ left: "8px" }, 500);
    position = "initial";
}
