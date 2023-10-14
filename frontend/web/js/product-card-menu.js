
class ContentMenu {

/**
 * @param {string} menu_selector селектор элементов меню.
 * @param {string} content_selector селектор элементов содержимого меню.
 */
  constructor (menu_selector, content_selector) {
    this._menu_items = document.querySelectorAll(menu_selector);
    this._current_menu_item = document.querySelector(`${menu_selector}.selected`);
    this._menu_items_content = document.querySelectorAll(content_selector);
    if (this._current_menu_item) {
      this._toggle_card_content();
    }
    this._menu_items.forEach(element => {
      element.addEventListener("click", () => {
        this._toggle_card_item(element);
      })
    });
  }

  _toggle_card_item(element) {
    this._current_menu_item.classList.remove("selected");
    this._current_menu_item = element;
    this._current_menu_item.classList.add("selected");
    this._toggle_card_content();
  }

  _toggle_card_content() {
    let current_menu_item_name = this._current_menu_item.dataset.menuItem;
    let current_menu_item_content = document.querySelector(`[data-menu-item-content="${current_menu_item_name}"]`);
    this._menu_items_content.forEach(element => {
      if (element == current_menu_item_content) {
        element.classList.remove("inactive");
      }
      else {
        element.classList.add("inactive");
      }
    });
    let toggle_content_event = new Event("toggle_content", {
      bubbles: true,
    });
    current_menu_item_content.dispatchEvent(toggle_content_event);
  }
}


function create_characteristics_more(characteristics_selector) {
  const product_card_characteristics = document.querySelector(characteristics_selector);
  const product_card_characteristics_more = document.createElement("div");
  product_card_characteristics_more.innerText = "Подробнее";
  product_card_characteristics_more.classList.add("more");
  product_card_characteristics.after(product_card_characteristics_more);
  product_card_characteristics_more.addEventListener("click", () => {
    product_card_characteristics.classList.add("open");
    product_card_characteristics_more.remove();
  }, {
    once: true,
  });

  const product_card_info = document.querySelector(".product-card__info");
  product_card_info.addEventListener("toggle_content", (event) => {
    console.log(event);
    if (event.target === product_card_characteristics) {
      product_card_characteristics_more.style.display = null;
    }
    else {
      product_card_characteristics_more.style.display = "none";
    }
  });
}

create_characteristics_more(".product-card__info__characteristics");

let content_menu = null;
if (window.innerWidth <= 768) {
  content_menu = new ContentMenu(".product-card__menu__item", "[data-menu-item-content]")
}
window.addEventListener("resize", () => {
  if (!content_menu){
    content_menu = new ContentMenu(".product-card__menu__item", "[data-menu-item-content]")
  }
});

