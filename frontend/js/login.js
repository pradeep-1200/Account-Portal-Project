$(document).ready(function () {

    $("#loginBtn").click(function () {

        let email = $("#email").val();
        let password = $("#password").val();

        if (email === "" || password === "") {
            alert("All fields required");
            return;
        }

        $.ajax({
            url: "../backend/login.php",
            type: "POST",
            data: { email, password },
            success: function (response) {
                alert(response.message);

                if (response.status === "success") {
                    // Session handling comes next lesson
                }
            }
        });

    });

});
