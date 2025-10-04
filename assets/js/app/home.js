import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";
import { User } from "../_shared/classes/User.js";
import { Toast } from "../_shared/classes/Toast.js";

document.querySelector("#enrollment-btn").setAttribute("disabled", "disabled");
let user = {};
fetch("http://localhost/Sarau-Web/api/users/findById", {
    headers: { token: userAuth.token }, 
    method: "GET"
}).then(res => res.json().then(data => {
    console.log(data);
    if (data.user.gender == null || data.user.gender == undefined || data.user.gender == "") {
        console.log("Perfil incompleto!");
        new Toast("Por favor, complete o perfil!", "warning", "long").show();
    }
    else {
        document.querySelector("#enrollment-btn").removeAttribute("disabled");
        showModal("container-modal", "enrollment-btn");
        console.log("Perfil completo!");
    }

    document.querySelector("#name").value = data.user.name;
    document.querySelector("#email").value = data.user.email;
    document.querySelector("#gender").value = data.user.gender;
    document.querySelector("#phone").value = data.user.number_phone;
    document.querySelector("#birth_date").value = data.user.birth_date;

    document.querySelectorAll(".fix").forEach(input => {
        input.style.backgroundColor = "#e9ecef";
        input.style.cursor = "not-allowed";
        input.style.color = "#6c757d";
        input.addEventListener("click", () => {
            new Toast("Campos fixos! Para alterá-los, vá ao perfil de usuário.", "warning", "long").show();
        })
    })

    user = new User(undefined, data.user.name);
    document.querySelector(".user-greeting span").innerHTML = `Olá, ${user.getFirstName()}!`;

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