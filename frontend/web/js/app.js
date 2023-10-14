
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

    // clearn search params
    let search_params = document.querySelectorAll(".single__search__param");
    if (search_params !== null) {
        search_params.forEach(function(param) {
            param.addEventListener('click', (obj) => {
                let search_attribute = param.getAttribute('data-search-attribute');
                let url = new URL(document.URL);
                url.searchParams.delete(search_attribute);
                window.location.href = url;
            })
        });
    }

    let clear_label = document.querySelector(".clear__search");
    if (clear_label != null) {
        clear_label.addEventListener('click', (obj) => {
            let new_url = location.protocol + '//' + location.host + location.pathname;
            window.location.href = new_url;
        });
    }

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
});