document.addEventListener("DOMContentLoaded", () => {
  const footer = document.querySelector(".site-footer");
  if (!footer) return;

  const toggles = footer.querySelectorAll(".site-footer__toggle");
  const mobileQuery = window.matchMedia("(max-width: 640px)");

  const setMobileState = () => {
    toggles.forEach((toggle) => {
      const links = document.getElementById(toggle.getAttribute("aria-controls"));
      if (!links) return;

      toggle.setAttribute("aria-expanded", mobileQuery.matches ? "false" : "true");
      links.hidden = false;
    });
  };

  toggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      if (!mobileQuery.matches) return;

      const expanded = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!expanded));
    });
  });

  setMobileState();

  if (typeof mobileQuery.addEventListener === "function") {
    mobileQuery.addEventListener("change", setMobileState);
  } else {
    mobileQuery.addListener(setMobileState);
  }
});
