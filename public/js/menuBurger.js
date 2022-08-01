// MENU BURGER //

const toggleBtn = document.querySelector('.toggle-btn');
const mainMenu = document.querySelector('.menu');

toggleBtn.addEventListener('click', () => {
  toggleBtn.classList.toggle('active');
  mainMenu.classList.toggle('back');
});
