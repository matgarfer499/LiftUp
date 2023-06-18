"use strict";

let $input = $("#searchBar");

let token = $('meta[name="csrf-token"]').attr("content");
$input.on("input", function (event) {
    event.preventDefault();
    if ($input.val().trim() === "") {
        return;
    }else{
        let urlData = $("#url").data("url")
        $.ajax({
            url: urlData + "/" + $input.val(),
            type: "GET",
            headers: {
                "X-CSRF-TOKEN": token, 
            },
            data: {
                search: $input.val(),
                url: urlData,
            },
            success: function (response) {
                $("#table").html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            },
        });
    }
});