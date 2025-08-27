// import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";
import { User } from "../_shared/classes/User.js";
import { Toast } from "../_shared/classes/Toast.js";

let user = {};
fetch("http://localhost/Sarau-Web/api/users/findById", {
    headers: { token: userAuth.token }, 
    method: "GET"
}).then(res => res.json().then(data => {
    console.log(data);
    user = new User(undefined, data.user.name);
    document.querySelector(".user-greeting span").innerHTML = `Olá, ${user.getFirstName()}!`;
}))