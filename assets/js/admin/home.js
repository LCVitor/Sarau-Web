import { userAuth } from "../_shared/functions/functions.js";
import { Toast } from "../_shared/classes/Toast.js";

let enrollments = [];

// Pegar os dados do usuário para saudação
fetch("http://localhost/Sarau-Web/api/users/findById", {
    headers: { token: userAuth.token },
    method: "GET"
}).then(res => res.json().then(data => {
    const firstName = data.user.name.split(" ")[0];
    document.querySelector(".user-greeting span").innerHTML = `Olá, ${firstName}!`;
}));

// Pegar todas as inscrições
fetch("http://localhost/Sarau-Web/api/enrollments/selectAll", {
    headers: { token: userAuth.token },
    method: "GET"
}).then(res => res.json().then(data => {
    enrollments = data;
    renderLastEnrollments();
    setupViewAllButton();
}));

// Mostrar últimas inscrições no card
function renderLastEnrollments() {
    const cardContent = document.querySelector(".card.demo-card:nth-child(2) .card-content");
    cardContent.innerHTML = "";

    const lastTwo = enrollments.slice(-2).reverse(); // últimas 2

    lastTwo.forEach(en => {
        const div = document.createElement("div");
        div.classList.add("enrollment");
        div.innerHTML = `
            <p class="enroll-name">${en.user_name}</p>
            <p class="enroll-event">${en.sector_name} - ${en.enrollment_pt}</p>
        `;
        cardContent.appendChild(div);
    });
}

// Configurar botão "Ver Inscrições"
function setupViewAllButton() {
    const btn = document.querySelector(".card.demo-card:nth-child(2) .btn-card");
    const modal = document.querySelector("#container-modal");
    const enrollmentsList = document.querySelector("#enrollments-list");
    const closeBtn = document.querySelector("#close-enrollments-modal");

    btn.addEventListener("click", () => {
        enrollmentsList.innerHTML = "";

        enrollments.forEach(en => {
            const div = document.createElement("div");
            div.style.borderBottom = "1px solid #ccc";
            div.style.padding = "5px 0";
            div.innerHTML = `
                <p><b>Participante:</b> ${en.user_name}</p>
                <p><b>Setor:</b> ${en.sector_name}</p>
                <p><b>Duração:</b> ${en.enrollment_pt}</p>
            `;
            enrollmentsList.appendChild(div);
        });

        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
}
