$(document).ready(function () {

    $("#sign_in").click(function (event) {

        event.preventDefault();

        $.ajax({
            method: "POST",
            data: {
                firstName : $("#inputName").val(),
                lastName : $("#inputLastName").val(),
                birthdate : $("#birthdate").val(),
                gender : $("#gender").val(),
                city : $("#inputCity").val(),
                mail : $("#inputEmail").val(),
                password : $("#inputPassword").val()
            },
            url: 'Register_form_script.php',
            success: function(data)
            {
                if (data)
                {
                     alert("You successfully create an account");
                     window.location.href = "index.php";
                } else {
                    $("#error").html("<br>Something went wrong");
                }
            }
        })
    });
});