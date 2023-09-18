jQuery(() => {
    $("#form_register").on("submit", function (e) {
        e.preventDefault();
        clear_error_inputs();
        $.ajax({
            url: "app/controller/registerController.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                const data_response = JSON.parse(response);
                alert("Registro con exito");
                $("#form_register .form-control").val("");
                $("#table tbody").empty();
                data_registers(data_response.records);
                return;
            },
            error: function (error) {
                error_msg = JSON.parse(error.responseText);
                show_msg_error_from(error_msg);
                return;
            },
        });
    });

    $("#clear").on("click", () => {
        clear_error_inputs();
        console.clear();
    });
});

const show_msg_error_from = (errors) => {
    for (const error in errors) {
        if (Object.hasOwnProperty.call(errors, error)) {
            const msg_error = errors[error];
            const $field = $(`#${error}`);
            $field.addClass("is-invalid");
            $field.next().text(msg_error);
        }
    }
};

const clear_error_inputs = () => {
    $("#form_register .form-control").removeClass("is-invalid");
};

const data_registers = (records) => {
    records.map((record) => {
        const $tr = `
        <tr>
            <td>${record.id}</td>
            <td>${record.name}</td>
            <td>${record.last_name}</td>
            <td>${record.phone}</td>
            <td>${record.address}</td>
            <td>${record.state}</td>
            <td>${record.city}</td>
            <td>${record.neighborhood}</td>
            <td>${record.birthday_date}</td>
            <td>${record.identity_card}</td>
        </tr>`;
        $("#table tbody").append($tr);
    });
};
