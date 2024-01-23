
const catalog_sort = document.querySelector(".js-catalog-sort")
if (catalog_sort != null) {
  const catalog_sort_choices = new Choices(catalog_sort, {
    position: "auto",
    allowHTML: true,
    searchEnabled: false,
    shouldSort: false,
    placeholder: false,
    itemSelectText: "",
  });
}