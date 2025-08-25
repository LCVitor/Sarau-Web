import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";
import { User } from "../_shared/classes/User.js";
import { Toast } from "../_shared/classes/Toast.js";

showModal("container-modal", "enrollment-btn");
let user = {};
fetch("http://localhost/Sarau-Web/api/users/findById", {
    headers: { token: userAuth.token }, 
    method: "GET"
}).then(res => res.json().then(data => {
    console.log(data);
    user = new User(undefined, data.user.name);
    document.querySelector(".user-greeting span").innerHTML = `Olá, ${user.getFirstName()}!`;

    if (data.user.gender != null) {
        console.log("Perfil completo!");
    }
    else {
        new Toast("Por favor, complete o perfil para acessar está funcionalidade!", "warning", "long").show();
        document.querySelector("#enrollment-btn").setAttribute("disabled", "disabled");
    }
}))

let presentation_time = document.querySelector("#presentation_time");
let sector = document.querySelector("#sector");
sector.addEventListener("change", () => {
    if (sector.value == "4") {
        presentation_time.setAttribute("readonly", "readonly");
        presentation_time.value = 0;
        new Toast("Exposições não precisam informar tempo de apresentação!", "warning", "long").show();
    }
    else {
        presentation_time.removeAttribute("readonly")
    }
})

const form = document.querySelector("form");
form.addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Sarau-Web/api/users/enrollment", {
        method: "POST",
        body: new FormData(form),
        headers: { token: userAuth.token }
    }).then(res => res.json().then(data => {
        console.log(data);
        if (data.type == "success") {
            new Toast(data.message, data.type, "short").show();
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            new Toast(data.message, data.type, "short").show();
        }
    }))
})

// Atuaalizar o DB para aceitar null.
