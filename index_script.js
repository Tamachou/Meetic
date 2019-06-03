$(document).ready(function () {

    $("#log_in").click(function (event) {

        event.preventDefault();

        $.ajax({
            method: "POST",
            data: {
                username : $("#inputEmail").val(),
                password : $("#inputPassword").val()
            },
            url: 'index_script.php',
            success: function(data)
            {
                if (data)
                {
                    window.location.href = "user_account.php";
                } else {
                    $("#error").html("<br>Something went wrong");
                }
            }
        })
    });
});