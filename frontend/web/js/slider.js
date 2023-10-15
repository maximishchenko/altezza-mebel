// import Swiper from "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs"

const slider_promo = new Swiper(".js-slider-promo", {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const slider_advantage = new Swiper(".js-slider-advantages", {
  slidesPerView: "auto",
  // spaceBetween: 15,
})

const slider_new = new Swiper(".js-slider-new", {
  freeMode: false,
  autoplay: true,  
  mousewheel: false,  
  slidesPerView: "auto",
  spaceBetween: 15,
  
});

const slider_recommendations = new Swiper(".js-slider-recommendations", {
  freeMode: false,
  autoplay: true,  
  mousewheel: false,  
  slidesPerView: "auto",
  spaceBetween: 15,
  
});

const slider_product_card_controller = new Swiper(".js-slider-product-card-controller", {
  slidesPerView: 4,
  spaceBetween: 5,
});

const slider_product_card_main = new Swiper(".js-slider-product-card-main", {
  effect: "slide",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: slider_product_card_controller
  }
});

// const slider_product_card_main__items = document.querySelectorAll(".product-card__slider__main__item")
// slider_product_card_main__items.forEach(item => {
  // item.setAttribute("data-fancybox", "product-card")
  // item.setAttribute("data-src", "/static/ourStoryImg.webp")
// });

if (document.querySelector('[data-fancybox="product-card"]') != null) {
  Fancybox.bind('[data-fancybox="product-card"]', {
    Thumbs: {
      type: "classic",
    },
    on: {
      "Carousel.change": (fancybox) => {
        // console.log(fancybox.getSlide().index)
        slider_product_card_main.slideTo(fancybox.getSlide().index)
      }
    }
  })
}
