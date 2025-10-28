import { Toast } from "../_shared/classes/Toast.js";
import { showModal } from "../_shared/functions/functions.js";
import { userAuth } from "../_shared/functions/functions.js";

let enrollments = [];
let currentPage = 1;
const perPage = 5;

function renderEnrollments() {
    const tbody = document.querySelector("tbody");
    tbody.innerHTML = "";
    const start = (currentPage - 1) * perPage;
    const end = start + perPage;
    const pageItems = enrollments.slice(start, end);
    let string = "";

    pageItems.forEach(en => {
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
    setupButtons();
    updatePagination();
}

function setupButtons() {
    document.querySelectorAll(".eye").forEach(btn => {
        btn.addEventListener("click", () => {
            fetch(`http://localhost/Sarau-Web/api/enrollments/selectById/${btn.value}`, {
                headers: { token: userAuth.token },
                method: "GET"
            }).then(res => res.json().then(data => {
                document.querySelector("#user-name").innerHTML = `Nome: <b>${data.user_name}</b>`;
                document.querySelector("#user-email").innerHTML = `Email: <b>${data.user_email}</b>`;
                document.querySelector("#user-gender").innerHTML = `Gênero: <b>${data.user_gender}</b>`;
                document.querySelector("#user-birth").innerHTML = `Ano de Nascimento: <b>${data.user_birth_year}</b>`;
                document.querySelector("#user-phone").innerHTML = `Telefone: <b>${data.user_phone}</b>`;
                document.querySelector("#event-name").innerHTML = `Evento: <b>${data.event_name}</b>`;
                document.querySelector("#event-date").innerHTML = `Data: <b>${data.event_date}</b>`;
                document.querySelector("#sector-name").innerHTML = `Setor: <b>${data.sector_name}</b>`;
                document.querySelector("#presentation-time").innerHTML = `Duração: <b>${data.enrollment_time}</b>`;
                document.querySelector("#observation").innerHTML = `Observação: <b>${data.enrollment_observation}</b>`;
                document.querySelector("#status").innerHTML = `Status: <b>${data.status ?? "Não avaliado"}</b>`;

                document.querySelector("#container-modal-type-1").style.display = "flex";
                document.querySelector("#close-btn").addEventListener("click", () => {
                    document.querySelector("#container-modal-type-1").style.display = "none";
                });
            }));
        });
    });

    document.querySelectorAll(".approved").forEach(btn => {
        btn.addEventListener("click", () => {
            fetch(`http://localhost/Sarau-Web/api/enrollments/addApproved/${btn.value}`, {
                headers: { token: userAuth.token },
                method: "GET"
            }).then(res => res.json().then(data => {
                new Toast("Deferimento realizado com sucesso!", "success", "short").show();
                if (data) setTimeout(() => location.reload(), 2000);
            }));
        });
    });

    document.querySelectorAll(".denied").forEach(btn => {
    btn.addEventListener("click", () => {
        const modal = document.querySelector("#container-modal");
        modal.style.display = "flex";

        modal.querySelector("#close-btn").onclick = () => {
            modal.style.display = "none";
        };

        const form_d = document.querySelector("#form-d");

        const oldInput = form_d.querySelector('input[name="id"]');
        if (oldInput) oldInput.remove();

        const hidden = document.createElement("input");
        hidden.type = "hidden";
        hidden.name = "id";
        hidden.value = btn.value;
        form_d.appendChild(hidden);

        form_d.onsubmit = e => {
            e.preventDefault();
            fetch(`http://localhost/Sarau-Web/api/enrollments/addDismissed`, {
                headers: { token: userAuth.token },
                method: "POST",
                body: new FormData(form_d),
            }).then(res => res.json().then(data => {
                new Toast(data.message, "success", "short").show();
                if (data) setTimeout(() => location.reload(), 2000);
            }));
            }
        });
    });
}

function updatePagination() {
    const pagination = document.querySelector(".pagination");
    const buttons = pagination.querySelectorAll("button");
    const totalPages = Math.ceil(enrollments.length / perPage);

    buttons.forEach(btn => btn.disabled = false);
    buttons.forEach(btn => btn.classList.remove("active"));

    buttons[1].textContent = currentPage;
    buttons[1].classList.add("active");

    buttons[0].disabled = currentPage === 1;
    buttons[4].disabled = currentPage === totalPages;

    buttons[0].onclick = () => { if(currentPage > 1) { currentPage--; renderEnrollments(); } };
    buttons[4].onclick = () => { if(currentPage < totalPages) { currentPage++; renderEnrollments(); } };
}

// Fetch inicial
getEnrollments().then(data => {
    enrollments = data;
    renderEnrollments();
});

function getEnrollments() {
    return fetch("http://localhost/Sarau-Web/api/enrollments/selectAll", {
        headers: { token: userAuth.token },
        method: "GET"
    }).then(res => res.json());
}
