/************ Menu burger (icone) ************/

const burger = document.querySelector(".burger");

const nav = document.querySelector("header > nav");

burger.addEventListener("click", () => {
  nav.classList.toggle("navActive");
});


/************ Menu Deroulant ************/

const menuD = document.querySelector(".univers")
const menu = document.querySelector(".menu>ul>li ul")

menuD.addEventListener("click", () =>{
  menu.classList.toggle("menuActive")
})
