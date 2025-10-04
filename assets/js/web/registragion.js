import { Toast } from "../_shared/classes/Toast.js";
import { showModal } from "../_shared/functions/functions.js";
showModal("container-modal-type-1", "registration-btn");

const form = document.querySelector("#form-registration");
form.addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Sarau-Web/api/users/registration", {
        method: "POST",
        body: new FormData(form),
    }).then(res => res.json().then(data => {
        console.log(data);
        new Toast(data.message, data.type, "short").show();
        setTimeout(() => {
            if (data.type == "success") { location.reload(); }
        }, 2000);
    }))
})