class SwipeAxisXCarousel {
        
    constructor(element, options) {
        this._elements = document.querySelectorAll(element);
        this._setParams(options);
        this._run();
    }

    _setParams(options) {
        this._activeClass = options.activeClass || 'active';
        this._rootClass = options.rootClass || 'root_wrapper';
        this._thumbWrapperClass = options.thumbWrapperClass || 'thumb_wrapper';
        this._thumbWrapperTableClass = options.thumbWrapperTableClass || 'thumb_wrapper__table';
        this._imageWrapperClass = options.imageWrapperClass || 'image_wrapper';
    }

    /**
     * Hide all images inside this._elements and display one by index
     * @param {*} images all images items
     * @param {*} index index of active image
     */
    _showImage(images, activeIndex) {
        images.forEach(function (image) {
            image.style.display = "none";
        });
        images[activeIndex].style.display = "block";
    }

    /**
     * Show active item div
     * @param {*} items all div's
     * @param {*} activeIndex index of active div
     */
    _showActiveItem(items, activeIndex) {
        items.forEach(item => {
            item.classList.remove(this._activeClass);
        });
        items[activeIndex].classList.add(this._activeClass);
    }

    _run() {
        this._elements.forEach((el) => {

            if (!el.classList.contains(this._rootClass)) {

                /**
                 * Append this._roorClass into element's classList
                 */            
                el.classList.add(this._rootClass);

                /**
                 * Append div with class this._thumbWrapperClass and div with class this._thumbWrapperTableClass into el
                 */
                let elThumbWrapper = document.createElement('div');
                elThumbWrapper.setAttribute('class', this._thumbWrapperClass);
                let elThumbWrapperTable = document.createElement('div');
                elThumbWrapperTable.setAttribute('class', this._thumbWrapperTableClass);

                /**
                 * Append div with class this._imageWrapperClass into el
                 */
                let elImagesWrapper = document.createElement('div');
                elImagesWrapper.setAttribute('class', this._imageWrapperClass);

                /**
                 * Move all images from this._element into div this._imageWrapperClass.
                 * Create div's for each image inside div this._thumbWrapperTableClass. Set active class for first div element
                 */
                let images = el.querySelectorAll('img');
                images.forEach((image, index) => {
                    elImagesWrapper.appendChild(image);
                    let child_div = document.createElement('div');
                    if (index == 0) {
                        child_div.classList.add(this._activeClass);
                    }
                    elThumbWrapperTable.appendChild(child_div);
                });

                /**
                 * Find each div inside this._thumbWrapperTableClass append this._activeClass on hover or on drag touch event
                 * Also append class this._activeClass for this._thumbWrapperTableClass
                 * Set display: block property for active image
                 * Set display: none property for another images
                 */
                let items_div = elThumbWrapperTable.querySelectorAll('div');
                items_div.forEach((item, index, items_array) => {

                    /**
                     * Hover event handler
                     */
                    item.addEventListener("mouseover", event => {
                        this._showImage(images, index);
                        // this._showActiveItem(items_div, index);
                            
                        /**
                         * Check if mouse not over parent element
                         */
                        if (Array.from(items_array).indexOf(event.toElement) > -1) {
                            this._showActiveItem(items_div, index);
                        }

                    });
                    
                    /**
                     * Drag touch event handler
                     */
                    item.addEventListener("touchmove", event => {
                        // event.preventDefault();
                        let touch_position = event.changedTouches[0];
                        let real_target = document.elementFromPoint(touch_position.clientX, touch_position.clientY);

                        /**
                         * Check if mouse not over parent element
                         */
                        let target_index = Array.from(items_array).indexOf(real_target);
                        if (target_index != -1) {
                            this._showImage(images, target_index);
                            this._showActiveItem(items_div, target_index);
                        }
                    });

                    elThumbWrapperTable.classList.add(this._activeClass);
                });

                elThumbWrapper.appendChild(elThumbWrapperTable);
                el.appendChild(elThumbWrapper);
                el.appendChild(elImagesWrapper);

            }
        });
    }
}