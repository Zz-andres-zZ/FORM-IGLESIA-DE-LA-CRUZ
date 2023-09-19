

const API = {
    ELIM: {
        STORE: "http://localhost:7000/api/v1/elim/store"
    }
}


jQuery(() => {

    handle_submit_form();
    handle_click_clear();

});


const handle_click_clear = () => {
    $("#clear").on("click", () => {
        clear_error_inputs();
        console.clear();
    });
}

const handle_submit_form = () => {
    $("#form_register").on("submit", function (e) {
        e.preventDefault();
        clear_error_inputs();
        submit_form($(this).serialize());
    });
}


const submit_form = (data) => {
    $.ajax({
        url: API.ELIM.STORE,
        type: "POST",
        data: data,
        success: function (response) {
            const data_response = JSON.parse(response);
            alert("Registro con exito");
            $("#form_register .form-control").val("");
            /* console.log("response2", data_response.records); */
            $("#table tbody").empty();
            data_registers(data_response.records);
            return;
        },
        error: function (error) {
            // error_msg = JSON.parse(error.responseText);
            show_msg_error_from(error.responseJSON.msg);
            console.log("error", error);
            return;
        },
    });
}


const show_msg_error_from = (errors) => {
    console.log('errors', errors)
    for (const error in errors) {
        if (Object.hasOwnProperty.call(errors, error)) {
            const msg_error = errors[error];
            console.log('msg_error', {
                msg_error: msg_error,
                error: error
            })
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
