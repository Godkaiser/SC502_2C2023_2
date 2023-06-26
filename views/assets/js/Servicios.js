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