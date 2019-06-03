$(document).ready(function () {
    $("#research").click(function (event) {

        event.preventDefault();

        $.ajax({
            method: "POST",
            data: {
                'gender': $("#gender").val(),
                'age': $("#age").val(),
                'city': $("#city").val(),
                'cityTwo' : $("#cityTwo").val(),
            },
            url: 'search_script.php',
            success: function(data)
            {
                let result = JSON.parse(data);
                if (data !== 'null')
                {
                    $("#error").html("");
                    $("#result").css('visibility', 'visible');
                    $("#result").empty();
                    $("#result").append('<div id="slider"><ul></ul></div>')
                    $.each(result, function (val , key) {
                        $('#result ul').append(`<li>${key['last_name']} ${key['name']} <br> ${key['city']}</li>`);

                    });
                    $('#slider').append(`<a href="#" class="control_next">></a><a href="#" class="control_prev"><</a>`);

                    $('#slider').slideshow();
                } else {
                    $("#error").html("<br>Nothing here but chickens");
                }
            }
        })
    });
});