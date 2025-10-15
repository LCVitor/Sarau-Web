import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";
import { User } from "../_shared/classes/User.js";
import { Toast } from "../_shared/classes/Toast.js";

let user = {};
fetch("http://localhost/Sarau-Web/api/users/findById", {
    headers: { token: userAuth.token }, 
    method: "GET"
}).then(res => res.json().then(data => {
    console.log(data);
    let name = document.querySelector("#nowName");
    let email = document.querySelector("#nowEmail");
    let phone = document.querySelector("#phone");
    let date = document.querySelector("#date");
    let gender = document.querySelector("#gender");
    name.value = data.user.name;
    email.value = data.user.email;
    date.value = data.user.birth_date;
    phone.value = data.user.number_phone;
    gender.value = data.user.gender;

    user = new User(data.user.id, data.user.name);
    document.querySelector(".user-greeting span").innerHTML = `Olá, ${user.getFirstName()}!`;
}))

let form_complete_profile = document.querySelector("#complete-profile");
form_complete_profile.addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Sarau-Web/api/users/complete_Profile", {
            method: "POST",
            body: new FormData(form_complete_profile),
            headers: { token: userAuth.token } 
        }).then(res => res.json().then(data => {
            console.log(data);
            const toast = new Toast(data.message, data.type, "short");
            toast.show();
            if (data.type == "success") {
                setTimeout(() => {
                    location.href = reload();
                }, 3000)
            }
        }))
})