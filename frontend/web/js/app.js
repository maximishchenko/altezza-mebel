// ajax-подгрузка товаров в каталоге 
const catalogList = document.querySelector('.catalog__list');
// const catalogSpinner = document.querySelector('.spinner-container');
const filterForm = document.querySelector('#searchForm');
const catalogItemsInformation = document.querySelector('#showMore');
if (catalogItemsInformation) {
    const csrfToken = catalogItemsInformation.getAttribute('data-csrf-token');
}
// const csrfToken = catalogItemsInformation.getAttribute('data-csrf-token');
// Фильтр
const searchBtn = document.querySelector('#catalog__searh-btn');
const searchFormIntp = document.querySelectorAll('#searchForm input');
const catalogSort = document.querySelector('.catalog__sort');
const loader = document.getElementsByClassName('loader-wrapper')[0];
   
const catalogProductsObserver = new IntersectionObserver((entries) => {
    entries.forEach(element => {
          if (element.isIntersecting) {
              appendProductsToCatalog();
              catalogProductsObserver.unobserve(element.target)
          }
    })
});


function catalogUrlParams() {
    let data = new FormData(filterForm);
    let params = new URLSearchParams(data);
    return params.toString()
}

function ajaxHeaders() {
    let headers = {
        'Content-Type': 'application/x-www-form-urlencoded',
        'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content,
        'X-Requested-With': 'XMLHttpRequest'
    }
    return headers
}

function appendProductsToCatalog()
{
    let pageNumber = parseInt(catalogItemsInformation.getAttribute('data-page'));
    let totalPages = parseInt(catalogItemsInformation.getAttribute('data-page-count'));
    if (pageNumber !== totalPages) {
        // TODO display spinner block
        loader.classList.add('active');

        fetch(`${window.location.pathname}?${catalogUrlParams()}`, {
            method: 'POST',
            body: `page=${pageNumber + 1}&_csrf-frontend=${csrfToken}`,
            headers: ajaxHeaders()
        })
        .then((response) => {
            if (!response.ok) {
                  location.reload();
            }
            return response.json();
        })
        .then((data) => {
            pageNumber++
            catalogItemsInformation.setAttribute('data-page', pageNumber);
            catalogList.insertAdjacentHTML('beforeend', data.content);
            let lastChildItem = catalogList.querySelector('[data-key]:last-child');
            if (lastChildItem != null) {
                catalogProductsObserver.observe(lastChildItem);
            }
            // catalogProductsObserver.observe(catalogList.querySelector('[data-key]:last-child'));
            // TODO hide spinner block

            loader.classList.remove('active');
        });
    }
}


function catalogAjaxSearch() {
    loader.classList.add('active');
    console.log(loader)
    catalogProductsObserver.disconnect();
    let searchParams = catalogUrlParams();

    fetch(`${window.location.pathname}?${searchParams}`, {
          headers: ajaxHeaders()
    })
    .then((response) => {
          if (!response.ok) {
                location.reload();
          }
          return response.json();
    })
    .then((data) => {
          catalogList.innerHTML = data.content;
          catalogItemsInformation.setAttribute('data-page', 1);
          catalogItemsInformation.setAttribute('data-page-count', data.pagesCount);
          let lastChildItem = catalogList.querySelector('[data-key]:last-child');
          if (lastChildItem != null) {
            catalogProductsObserver.observe(lastChildItem);
          }
          loader.classList.remove('active');
        //   catalogProductsObserver.observe(catalogList.querySelector('[data-key]:last-child'));
    });

    let url = window.location.origin + window.location.pathname
    let searchUrl = url + "?" + searchParams;
    history.replaceState("", "", searchUrl);

    // renderSearchLabels();
}

// clear search params
// function clearSearchParams() {
//     let search_params = document.querySelectorAll(".single__search__param");
//     if (search_params !== null) {
//         search_params.forEach(function(param) {
//             param.addEventListener('click', (obj) => {
//                 let search_attribute = param.getAttribute('data-search-attribute');
//                 let searchInputs = document.querySelectorAll(`[name="${search_attribute}"]`);
//                 searchInputs.forEach((input) => {
//                     if (input.type === 'checkbox') {
//                         input.removeAttribute('checked');
//                     }
//                 });
//                 let url = new URL(document.URL);
//                 url.searchParams.delete(search_attribute);
//                 console.log(url);
//                 catalogAjaxSearch();
//                 // window.location.href = url;
//             });
//         });
//     }
// }

// function resetSearch() {
//     let clear_label = document.querySelectorAll(".clear__search");
//     if (clear_label != null) {
//         clear_label.forEach((label) => {
//             label.addEventListener('click', (obj) => {
//                 filterForm.reset();
//                 catalogAjaxSearch();
//                 // let new_url = location.protocol + '//' + location.host + location.pathname;
//                 // window.location.href = new_url;
//             });
//         })
//     }
// }

// function renderSearchLabels() {
    
//     let searchParams = catalogUrlParams();
//     fetch(`/catalog/search-params.json?${searchParams}`, {
//         headers: ajaxHeaders()
//     })
//     .then((response) => {
//             if (!response.ok) {
//                 location.reload();
//             }
//             return response.json();
//     })
//     .then((data) => {
//         if (!data) {
//             return;
//         }
//         let filter__labels = document.querySelector("#filter__labels");
        
//         let picked_filters = document.createElement("div");
//         picked_filters.classList.add("swiper")
//         picked_filters.classList.add("js-slider-picked-filters");
        
//         let picked_filters_list = document.createElement("ul");
//         picked_filters_list.classList.add("swiper-wrapper");
//         picked_filters_list.classList.add("catalog__picked-filters");

//         for (const key in data) {
//             let picked_filters_list_item = document.createElement("li");
//             picked_filters_list_item.classList.add("swiper-slide");
//             picked_filters_list_item.classList.add("catalog__picked-filters__item");
//             picked_filters_list_item.classList.add("single__search__param");
//             picked_filters_list_item.dataset.searchAttribute = data[key]['attribute'];
//             picked_filters_list_item.innerText = data[key]['name'] + ": " + numWord(data[key]['value'], ["значение", "значения", "значений"]);

//             picked_filters_list.append(picked_filters_list_item);
//         }

//         if (data.length != 0) {
//             let picked_filters_list_clear_item = document.createElement("li");
//             picked_filters_list_clear_item.classList.add("swiper-slide");
//             picked_filters_list_clear_item.classList.add("catalog__picked-filters__item");
//             picked_filters_list_clear_item.classList.add("filter-reset");
//             picked_filters_list_clear_item.classList.add("clear__search");
//             picked_filters_list_clear_item.innerText = "Сбросить параметры";
//             picked_filters_list.append(picked_filters_list_clear_item);
//         }


//         picked_filters.append(picked_filters_list);
//         let prev_picked_filters = document.querySelector(".js-slider-picked-filters");
//         if (prev_picked_filters) {
//             prev_picked_filters.remove();
//         }
//         filter__labels.append(picked_filters);
//         const slider_picked_filters = new Swiper(".js-slider-picked-filters", {
//             slidesPerView: "auto",
//             spaceBetween: 10
        
//         });
//         clearSearchParams();
//         resetSearch();
//     });
// }

// function numWord(value, words, show = true) {
//     let num = value % 100;
//     if (num > 19) { 
//         num = num % 10; 
//     }
    
//     let out = (show) ? value + ' ' : '';
//     switch (num) {
//         case 1:  out += words[0]; break;
//         case 2: 
//         case 3: 
//         case 4:  out += words[1]; break;
//         default: out += words[2]; break;
//     }
    
//     return out;
// }


function SwipeCarousel()
{  
  return new SwipeAxisXCarousel('.catalog__img', {
    activeClass: 'active',
    rootClass: 'root_wrapper',
    thumbWrapperClass: 'thumb_wrapper',
    thumbWrapperTableClass: 'thumb_wrapper__table',
    imageWrapperClass: 'item-image-wrapper',
  });
}


document.addEventListener('DOMContentLoaded', function(event) {

    SwipeCarousel();

    new PhoneMaskInputRus('input[data-tel-input]');

    let feedbackForms = document.querySelectorAll('form[data-feedback-form]');

    feedbackForms.forEach((form) => {
        form.addEventListener('submit', (submitEvent) => {
            submitEvent.preventDefault();
            fetch(form.action, {
                method: form.method,
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form),
            })
            .then((response) => {
                if (!response.ok) {
                    window.location.reload();
                }
            })
            .then(data => {
                document.querySelectorAll('.request__form').forEach((form) => {
                    form.reset();
                });
                if (modal.isOpen == true) {
                    modal.close();
                }
                modal.open("answer-request")
            });

        });
    });
   
    if (catalogList) {
        let lastCatalogProductItem = catalogList.querySelector('[data-key]:last-child');
        if (lastCatalogProductItem) {
            catalogProductsObserver.observe(lastCatalogProductItem);
        }
    }

    if (searchBtn) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogAjaxSearch();
        });
    }

    if (filterForm) {
        filterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            catalogAjaxSearch();
        });
    }


    // searchFormIntp.forEach(el => {
    //     el.addEventListener('change', (e) => {
    //         e.preventDefault();
    //         catalogAjaxSearch();
    //     });
    // });

    if (catalogSort) {
        catalogSort.addEventListener(
            //   "choice",
            "change",
            function (e) {
                e.preventDefault();
                catalogAjaxSearch();
                // console.log(e.detail.choice);
                // console.log(e.detail.choice.id);
                // console.log(e.detail.choice.value);
            },
            false,
    
        )
    }


    // renderSearchLabels();

});