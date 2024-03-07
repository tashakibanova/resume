let menu = document.querySelector("#menu");
let openMenu = document.querySelector("header");
menu.onclick = () => {
    menu.classList.toggle("fa-times");
    openMenu.classList.toggle("active");
}