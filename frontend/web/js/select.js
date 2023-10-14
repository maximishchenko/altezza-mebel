
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

  catalog_sort.addEventListener(
    "choice",
    function (event) {
      console.log(event.detail.choice);
      console.log(event.detail.choice.id);
      console.log(event.detail.choice.value);
    },
    false,

  )
  }