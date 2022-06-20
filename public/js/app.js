// MENU BURGER //

const toggleBtn = document.querySelector('.toggle-btn');
const mainMenu = document.querySelector('.menu');

toggleBtn.addEventListener('click', () => {
  toggleBtn.classList.toggle('active');
  mainMenu.classList.toggle('back');
});

// MENU DEROULANT //

const menuD = document.querySelector(".univers")
const menu = document.querySelector("#menu-toggle")

menuD.addEventListener("click", () =>{
  menu.classList.toggle("menuDeroulant")
})