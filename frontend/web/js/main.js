const nav_menu = document.querySelector(".js-nav-menu");
const nav_menu_button = document.querySelector(".js-nav-menu-button");

let window_state = "desktop"
const contacts = document.querySelector(".header__contacts")
if (window.innerWidth <= 560) {
  nav_menu.append(contacts)
  window_state = "mobile"
}
window.addEventListener("resize", () => {
  if (window.innerWidth <= 560 && window_state == "desktop") {
    nav_menu.append(contacts)
    window_state = "mobile"
  }
  else if (window.innerWidth > 560 && window_state == "mobile") {
    nav_menu_button.before(contacts)
    window_state = "desktop"
  }
})

function update_nav_menu_state(nav_menu) {
  nav_menu_button.classList.toggle("active");
  if (nav_menu_button.classList.contains("active")) {
    nav_menu.style.visibility = "visible";
    if (window_state == "mobile") {
      document.body.classList.add("noscroll");
    }
  }
  else {
    nav_menu.style.visibility = null;
    document.body.classList.remove("noscroll");
  }
}

nav_menu_button.addEventListener("click", () => {
  update_nav_menu_state(nav_menu);
});

nav_menu.addEventListener("click", (event) => {
  let target = event.target.closest('a');
  if (target && nav_menu.contains(target)) {
    update_nav_menu_state(nav_menu);
  }
});


// let product_cards = document.querySelectorAll(".catalog__list__item");
// product_cards.forEach(element => {
//   element.addEventListener("click", function () {
//     window.location.href = "productCard.html";
//   });
// });
