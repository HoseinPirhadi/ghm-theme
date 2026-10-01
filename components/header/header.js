document.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".site-header__menu");
  const nav = document.querySelector(".site-header__nav");

  if (!menu || !nav) return;

  const closeMenu = () => {
    menu.setAttribute("aria-expanded", "false");
    menu.setAttribute("aria-label", "باز کردن منوی سایت");
    nav.classList.remove("is-open");
  };

  menu.addEventListener("click", () => {
    const open = menu.getAttribute("aria-expanded") === "true";
    menu.setAttribute("aria-expanded", String(!open));
    menu.setAttribute("aria-label", open ? "باز کردن منوی سایت" : "بستن منوی سایت");
    nav.classList.toggle("is-open", !open);
  });

  nav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") closeMenu();
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 720) closeMenu();
  });
});