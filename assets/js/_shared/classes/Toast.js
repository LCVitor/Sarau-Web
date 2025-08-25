export class Toast {
    #message;
    #type;
    #duration;

    constructor(message, type, duration) {
        this.#message = message;
        this.#type = type;
        this.#duration = duration;
    }

    setDuration(duration) {
        switch (duration) {
            case "short":
                return 3000;

            case "long":
                return 6000;

            default:
                return 9000;
        }
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
            toast.style.color = "#000";
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
        }, this.setDuration(this.#duration));
    }
}