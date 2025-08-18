// fetch("http://localhost/Sarau-Web/api/users", {
//     method: "GET"
// }).then(response => {response.json().then(data => {console.log(data);})});
import { showModal } from "../_shared/functions/functions.js";
showModal("container-modal", "login-btn");

const form = document.querySelector("#form");
form.addEventListener("submit", e => {
    e.preventDefault();

    fetch("http://localhost/Sarau-Web/api/users/login", {
        method: "POST",
        body: new FormData(form),
    }).then(res => res.json().then(data => {
        console.log(data);

        if (data.type == "success") {
            localStorage.setItem("user", JSON.stringify(data.user));

            setTimeout(() => {
                // location.href = data.path;
                console.log(data.path);
            }, 3000)
        }
    }))
})