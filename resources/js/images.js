"use strict"

//Change the summary when you click on the details

materialsDisplay.addEventListener("click", function(){
    $("#moreLess svg").toggleClass('hidden');
});

//See the clothes photo when you click it

const imgContainers = document.querySelectorAll('.imgContainer');
const imgSelector = document.querySelectorAll(".imgSelector");

imgSelector.forEach(function(btn){
    btn.addEventListener('click', function(event){
        event.preventDefault();
        const index = parseInt(this.getAttribute('data-index'));
        const scrollContainer = imgContainers[index];

        const containerOffsetTop = scrollContainer.offsetTop;

        scrollContainer.parentElement.scrollTo({
            top: containerOffsetTop,
            behavior: "smooth",
        });
    });
});
