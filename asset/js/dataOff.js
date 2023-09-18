jQuery(() => {
    $("#form_register").on("click", "#register", function (e) {
        e.preventDefault();

        const form = $(this); // Define la variable form con la referencia al formulario.
        const formData = form.serializeArray();
        const jsonData = JSON.stringify(formData);

        if (navigator.onLine) {
            sendDataToServer(jsonData);
        } else {
            storeDataLocally(jsonData);
        }
    });
});

const storeDataLocally = (data) => {
    const storedData = localStorage.getItem("offlineData") || "[]";
    const dataArr = JSON.parse(storedData);
    dataArr.push(data);
    localStorage.setItem("offlineData", JSON.stringify(dataArr));
    console.log("Los datos se han guardado localmente.");
};

const sendDataToServer = (data) => {
    $.ajax({
        type: "POST",
        url: "app/controller/dataController.php",
        data: { jsonData: data },
        success: function (response) {
            console.log("Los datos se han guardado en el servidor");
            localStorage.setItem("offlineData", "[]");
            console.log("response", response);
        },
        error: function (error) {
            console.log("Error al enviar los datos al servidor.");
            console.log("Error", error);
        },
    });
};
