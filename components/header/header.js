document.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".site-header__menu");
  const nav = document.querySelector(".site-header__nav");

  if (!menu || !nav) return;

  menu.addEventListener("click", () => {
    const open = menu.getAttribute("aria-expanded") === "true";
    menu.setAttribute("aria-expanded", String(!open));
    nav.classList.toggle("is-open", !open);
  });
});