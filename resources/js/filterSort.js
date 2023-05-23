"use strict"

$('#filterBtn').click(function(){
    let sort = $('input[name="sort"]:checked').val()
    let gender = $(this).attr('value').charAt(0)
    let token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "/filter/"+gender+"/"+sort,
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': token // Agregar el token CSRF como un encabezado personalizado
        },
        data: {sort: sort},
        success: function(response){
            $('#clothesContainer').html(response);
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText);
        }
    });
});