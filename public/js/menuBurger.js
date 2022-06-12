const burger = document.querySelector(".burger");

const nav = document.querySelector("header > nav");

burger.addEventListener("click", () => {
  nav.classList.toggle("navActive");
});
