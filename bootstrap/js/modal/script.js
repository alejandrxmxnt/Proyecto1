// Obtener referencias a elementos HTML
const btnAbrirModal = document.getElementById("btnAbrirModal");
const miModal = document.getElementById("miModal");
const btnCerrarModal = document.getElementById("btnCerrarModal");

// Función para abrir el modal
btnAbrirModal.addEventListener("click", () => {
    miModal.style.display = "block";
});

// Función para cerrar el modal
btnCerrarModal.addEventListener("click", () => {
    miModal.style.display = "none";
});

// Cerrar el modal si se hace clic fuera de él
window.addEventListener("click", (event) => {
    if (event.target === miModal) {
        miModal.style.display = "none";
    }
});
