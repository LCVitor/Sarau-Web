export class User {
    #id;
    #name;
    #email;
    #role;
    #token;

    constructor(id, name, email, role, token) {
        this.#id = id;
        this.#name = name;
        this.#email = email;
        this.#role = role;
        this.#token = token;
    }

    addLocalStorage() {
        const userData = {
            id: this.#id,
            name: this.#name,
            email: this.#email,
            role: this.#role,
            token: this.#token,
        };
        localStorage.setItem("user", JSON.stringify(userData));
    }

    getUser() {
        const userJSON = JSON.parse(localStorage.getItem("user"));
        return new User(userJSON.id, userJSON.name, userJSON.email, userJSON.role, userJSON.token);
    }

    getInformationSpecify(info) {
        const userJSON = JSON.parse(localStorage.getItem("user"));
        return userJSON[info];
    }

    getFirstName() {
        let fullName = this.#name;
        return fullName.split(' ')[0];
    }
}