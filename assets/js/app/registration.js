import { Toast } from "../_shared/classes/Toast.js";
import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";


fetch("http://localhost/Sarau-Web/api/enrollments/selectByIdUser", {
    headers: { token: userAuth.token },
    method: "GET"
}).then(res => res.json().then(data => {
    console.log(data);
    let body = document.querySelector("#container-cards");
    let string = "";
    let status_description = "";
    data.forEach(e => {
        if (e.status == "Indeferido") {
            status_description = e.description_denied;
        }
        string += `
            <div class="card">
                <div id="title">
                    Abaixo
                </div>
                <div id="description">
                    ${e.observation}
                </div>
                <div id="time">
                    ${e.presentation_time}
                </div>
                <div id="sector">
                    ${e.sector_name}
                </div>
                <div id="status">
                    ${e.status}
                </div>
                <div id="description_denied">
                    ${status_description}
                </div>
            </div>
        `;
    }); 

    body.innerHTML = string;
}))