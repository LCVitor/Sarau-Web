fetch("http://localhost/Sarau-Web/api/users", {
    method: "GET"
}).then(response => {response.json().then(data => {console.log(data);})});

console.log("teste de coisa");