import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";
import { User } from "../_shared/classes/User.js";

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
        console.log("Perfil incompleto!");
    }
}))

// Fazer a inscrição!!!! (Front e back)
// Atuaalizar o DB para aceitar null.
// Verificador de perfil completo ou não.
// Mensagem.