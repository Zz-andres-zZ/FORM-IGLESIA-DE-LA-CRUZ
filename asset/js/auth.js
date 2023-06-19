jQuery(() => {
    $("#register").on("click", (e) => {
        e.preventDefault();
        $.ajax({
            url: "app/controller/controller.php",
            method: "POST",
            data: $("#form_register").serialize(),
            success: function (response) {},
            error: function (erro) {},
        });
    });
});
