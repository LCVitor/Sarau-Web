export function showModal(modal_id, button_id) {
    let btn_event = document.querySelector(`#${button_id}`);
    btn_event.addEventListener("click", () => {
        let modal = document.querySelector(`#${modal_id}`);
        modal.style.display = "flex";
        close(modal);
    })
}

function close(modal) {
    let btn_close = modal.querySelector("#close-btn");
    btn_close.addEventListener("click", () => {
        modal.style.display = "none";
    });
}

export let userAuth = JSON.parse(localStorage.getItem("user"));

export function getFirstName(fullName) {
    return fullName.split(' ')[0];
}