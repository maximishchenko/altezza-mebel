let pickedFilters = document.querySelectorAll(".js-slider-picked-filters");

if (pickedFilters != null) {
  const slider_picked_filters = new Swiper(".js-slider-picked-filters", {
    slidesPerView: "auto",
    // initialSlide: 10,
    spaceBetween: 10

  });

  // slider_picked_filters.el.addEventListener("mouseover", function () {
  //   slider_picked_filters.update();
  // },
  // {
  //   once: true
  // })
}