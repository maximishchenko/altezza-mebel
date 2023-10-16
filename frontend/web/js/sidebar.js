const sidebar_selector = ".sidebar";
const relative_selector = ".catalog";
const sidebar_element  = document.querySelector(sidebar_selector);
const relative_element = document.querySelector(relative_selector);

let hcStickyOptions = {
  stickTo: relative_selector,
  followScroll: true,
  top: 20,
  bottom: 20,
  responsive: {
    1024: {
      top: 100,
    },
    925: {
      disable: true,
    }
  }
};

let sidebar = null;

document.addEventListener("DOMContentLoaded", () => {
  sidebar = new hcSticky(sidebar_selector, hcStickyOptions);
});


const toggle_sidebar_button = document.querySelector(".catalog-filter-button");
  if (toggle_sidebar_button != null) {
  toggle_sidebar_button.addEventListener("click", () => {
    toggle_sidebar(sidebar_element, toggle_sidebar_button);
  });

  function toggle_sidebar (sidebar, button) {
    sidebar.classList.toggle("active");
    button.classList.toggle("active");

  }
}