let container_imgs = document.querySelector("#container-imgs");
let i = 0;
const img = [
    "assets/img/img1.jfif",
    "assets/img/img2.jfif",
    "assets/img/img3.jfif",
    "assets/img/img4.jfif",
    "assets/img/img5.jfif",
]
setInterval(() => {
    container_imgs.innerHTML = `<img id="model" src="${img[i]}" alt="Imagem: ${i}">`;
    i++;
    if (i >= img.length) i = 0;
}, 4000);