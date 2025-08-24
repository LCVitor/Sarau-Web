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
        const toast = new Toast("Por favor, complete o perfil para acessar está funcionalidade!", "warning");
        toast.show();
        document.querySelector("#enrollment-btn").setAttribute("disabled", "disabled");
    }
}))

const form = document.querySelector("form");
form.addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Sarau-Web/api/users/enrollment", { //Continuar daqui!!!
        method: "POST",
        body: new FormData(form),
        headers: { token: userAuth.token }
    }).then(res => res.json().then(data => {
        console.log(data);
    }))
})

// Fazer a inscrição!!!! (Front e back)
// Atuaalizar o DB para aceitar null.
