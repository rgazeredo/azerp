import Alpine from "alpinejs";
import Swal from "sweetalert2";

import "./bootstrap";

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

function deleteRecord() {
    Swal.fire({
        title: "Tem certeza que deseja remover?",
        showCancelButton: true,
        confirmButtonText: "Sim",
        cancelButtonText: "Não",
    }).then((result) => {
        if (result.isConfirmed) {
            const form = this.closest("form");
            form.submit();
        }
    });
}

const deleteElements = document.getElementsByClassName("deleteElement");
Array.from(deleteElements).forEach((el) => (el.onclick = deleteRecord));
