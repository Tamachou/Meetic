$(document).ready(function () {
    $("#cancel").click(function (event) {
        event.preventDefault();
        window.location.href = "user_account.php";
    });

    $("#rens_form").submit(function (event) {
        event.preventDefault();
        $.post(
            'user_account_edit_script.php',
            {
                firstName : $("#inputName").val(),
                lastName : $("#inputLastName").val(),
                birthdate : $("#birthdate").val(),
                gender : $("#gender").val(),
                city : $("#inputCity").val(),
                mail : $("#inputEmail").val(),
                password : $("#inputPassword").val()
            },
            function(data)
            {
                if (data)
                {
                    window.location.href = "user_account.php";
                } else {
                    $("#error").html("<br>Something went wrong");
                }
            }
        );
     });
    $("#save").click( function (event) {
        event.preventDefault();
        $.post(
            'user_account_edit_script.php',
            {
                firstName : $("#inputName").val(),
                lastName : $("#inputLastName").val(),
                birthdate : $("#birthdate").val(),
                gender : $("#gender").val(),
                city : $("#inputCity").val(),
                mail : $("#inputEmail").val(),
                password : $("#inputPassword").val()
            },
            function(data)
            {
                if (data)
                {
                    window.location.href = "user_account.php";
                } else {
                    $("#error").html("<br>Something went wrong");
                }
            }
        );
    });
});