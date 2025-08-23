export class Toast {
    #message;
    #type;

    constructor(message, type) {
        this.#message = message;
        this.#type = type;
    }

    show() {
        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = this.#message;
    
        if (this.#type == "success") {
            toast.style.backgroundColor = "#4CAF50";
        }
        else if (this.#type == "error") {
            toast.style.backgroundColor = "#F44336";
        }
        else if(this.#type == "warning") {
            toast.style.backgroundColor = "#FFC107";
        }
        else {
            toast.style.backgroundColor = "#fff";
        }
    
        toastContainer.appendChild(toast);
    
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);
    
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toastContainer.removeChild(toast);
            }, 500);
        }, 3000);
    }
}