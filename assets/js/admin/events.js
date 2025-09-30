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
                    <button class="button table eye" title="Visualizar">
                        <i class="fas fa-eye" id="eye"></i>
                    </button>

                    <button class="button table approved" title="Deferir">
                        <i class="fas fa-check-circle"></i>
                    </button>

                    <button class="button table denied" title="Indeferir">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    tbody.innerHTML = string;
    lucide.replace();

    
})

function getEnrollments() {
    return fetch("http://localhost/Sarau-Web/api/enrollments/selectAll", {
        headers: { token: userAuth.token },
        method: "GET"
    }).then(res => res.json())
};