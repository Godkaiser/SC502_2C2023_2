// Obtener todos los botones de servicio
var serviceButtons = document.getElementsByClassName("service-button");

// Agregar el evento click a cada botón
for (var i = 0; i < serviceButtons.length; i++) {
    serviceButtons[i].addEventListener("click", function () {
        // Cambiar la clase 'selected' al botón clicado y quitarla de los demás botones
        if (this.classList.contains("selected")) {
            this.classList.remove("selected");
        } else {
            this.classList.add("selected");
        }
    });
}

document.getElementById("appointment-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar que el formulario se envíe

    // Obtener los valores de los campos
    var services = [];
    var selectedButtons = document.getElementsByClassName("service-button selected");
    for (var i = 0; i < selectedButtons.length; i++) {
        services.push(selectedButtons[i].getAttribute("data-service"));
    }
    var name = document.getElementById("name-input").value;
    var date = document.getElementById("date-input").value;
    var time = document.getElementById("time-input").value;

    // Realizar alguna acción con los valores de los campos (enviar a un servidor, mostrar en consola, etc.)
    console.log("Servicios seleccionados: ", services);
    console.log("Nombre: " + name);
    console.log("Fecha: " + date);
    console.log("Hora: " + time);

    // Restablecer los campos del formulario
    document.getElementById("appointment-form").reset();
});




function Abrir_Nav() {
    document.getElementById("main").style.marginLeft = "10%";
    document.getElementById("miSidebar").style.width = "10%";
    document.getElementById("miSidebar").style.display = "block";
    document.getElementById("AbrirNav").style.display = 'none';
}
function Cerrar_Nav() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("miSidebar").style.display = "none";
    document.getElementById("AbrirNav").style.display = "inline-block";
}
