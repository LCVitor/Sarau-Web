import { Toast } from "../_shared/classes/Toast.js";
import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";

getEnrollments().then(data => {
    console.log(data);
    let tbody = document.querySelector("tbody");
    tbody.innerHTML = "";
    let string = "";

    data.forEach(en => {
        string += `
            <tr>
                <td>${en.enrollment_id}</td>
                <td>${en.enrollment_obs}</td>
                <td>${en.enrollment_pt}</td>
                <td>${en.sector_name}</td>
                <td>${en.user_name}</td>
                <td>
                    <button value="${en.enrollment_id}" class="button table eye" title="Visualizar">
                        <i class="fas fa-eye" id="eye"></i>
                    </button>

                    <button value="${en.enrollment_id}" class="button table approved" title="Deferir">
                        <i class="fas fa-check-circle"></i>
                    </button>

                    <button value="${en.enrollment_id}" class="button table denied" title="Indeferir">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    tbody.innerHTML = string;
    // lucide.replace();

    document.querySelectorAll(".eye").forEach(btn => {
        let string = "";
        btn.addEventListener("click", () => {
            fetch(`http://localhost/Sarau-Web/api/enrollments/selectById/${btn.value}`, {
                headers: { token: userAuth.token },
                method: "GET"
            }).then(res => res.json().then(data => {
                console.log(data);
                string = `
                    <p>ID de Inscrição: <b>${data.id}</b></p>
                    <p>Apresentador: <b>${data.id_user}</b></p>
                    <p>Setor artístico: <b>${data.id_sector_artistic}</b></p>
                    <p>Duração: <b>${data.presentation_time}</b></p>
                    <p>Observação: <b>${data.observation}</b></p>
                    <p>Status: <b id="event-state">Não avaliado</b></p>
                `;
                let modal = document.querySelector("#container-modal-type-1");
                modal.style.display = "flex";

                modal.querySelector("#event-info").innerHTML = string;

                modal.querySelector("#close-btn").addEventListener("click", () => {
                    modal.style.display = "none";
                });
            }))
        })
    })

    document.querySelectorAll(".approved").forEach(btn => {
        btn.addEventListener("click", () => {
            fetch(`http://localhost/Sarau-Web/api/enrollments/addApproved/${btn.value}`, {
                headers: { token: userAuth.token },
                method: "GET"
            }).then(res => res.json().then(data => {
                console.log(data);
                //Apenas mostra um toast
            }))
        })
    })

    document.querySelectorAll(".denied").forEach(btn => {
        btn.addEventListener("click", () => {
            let modal = document.querySelector("#container-modal");
            modal.style.display = "flex";

            modal.querySelector("#close-btn").addEventListener("click", () => {
                modal.style.display = "none";
            });

            let form_d = document.querySelector("#form-d");
            form_d.innerHTML += `<input type="hidden" name="id" value="${btn.value}">`;
            form_d.addEventListener("submit", e => {
                e.preventDefault();

                fetch(`http://localhost/Sarau-Web/api/enrollments/addDismissed`, {
                    headers: { token: userAuth.token },
                    method: "POST",
                    body: new FormData(form_d),
                }).then(res => res.json().then(data => {
                    new Toast(data.message, "success", "short").show();
                    console.log(data)
                }))
            }) 
        })
    })
})

function getEnrollments() {
    return fetch("http://localhost/Sarau-Web/api/enrollments/selectAll", {
        headers: { token: userAuth.token },
        method: "GET"
    }).then(res => res.json())
};