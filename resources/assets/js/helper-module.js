/*!
 * Get all siblings of an element
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 */

export const getSiblings = (elem) => {
	return Array.prototype.filter.call(elem.parentNode.children, (sibling) => {
		return sibling !== elem;
	});
};


/*
	formatting currency to rupiah
*/
export const formattingRupiah = (currency) => {
	return new Intl.NumberFormat('id-ID', {
		style: 'currency', currency: 'IDR'
	}).format(currency).replace(',00', '');
};

/**
 * set form action
 */
export const setFormAction = (form, url) => {
	document.querySelector(form).action = url
}

/**
 * get url without protocol
 */
export function getUrlWithoutProtocol(urlnya) {
	return urlnya.split('//').pop()
}

/**
 * capitalize first letter each word
 */

export const capitalizeFirstLetter = (string) => {
    return string[0].toUpperCase() + string.slice(1);
}

/**
 * set multiple attr
 */
export const setAttributes = (el, attrs) => {
    for (var key in attrs) {
      el.setAttribute(key, attrs[key]);
    }
}

/**
 * open / close a modal
 */
export function openCloseModal (modalSelector) {
    const modalEl = document.querySelector(modalSelector)
    const classToCloseModal = ['invisible', 'h-0', 'opacity-0']

    // if modal open, set isModalOpen = true. else, isModalOpen = false
    let isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
    
    if (isModalOpen === true) {
        // close modal
        modalEl.classList.remove(...classToCloseModal)
    }
    else {
        // open modal
        modalEl.classList.add(...classToCloseModal)

        if (modalEl.querySelectorAll('input, textarea')) {
            modalEl.querySelectorAll('input:not([name="_method"]):not([name="_token"]), textarea').forEach(inputOrTextarea => {
                inputOrTextarea.value = ''
            })
        }
    }
}

/*!
 * Get all of an element's parent elements up the DOM tree
 * (c) 2019 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Node}   elem     The element
 * @param  {String} selector Selector to match against [optional]
 * @return {Array}           The parent elements
 */
export const getParents = function (elem, selector) {

	// Setup parents array
	var parents = [];

	// Get matching parent elements
	while (elem && elem !== document) {

		// If using a selector, add matching parents to array
		// Otherwise, add all parents
		if (selector) {
			if (elem.matches(selector)) {
				parents.push(elem);
			}
		} else {
			parents.push(elem);
		}

		// Jump to the next parent node
		elem = elem.parentNode;

	}

	return parents;

};

export const boxiconHoverChangeColor = (icon, hoverColor) => {
    const originalIconColor = icon.getAttribute('color')

    icon.addEventListener('mouseover', () => {
        icon.setAttribute('color', hoverColor)
    })
    icon.addEventListener('mouseleave', () => {
        icon.setAttribute('color', originalIconColor)
    })

}

export const kebabToSnake = (string) => {
    return string.replace('-', '_')
}

export const pageUrl = window.location.pathname
export const appUrl = window.location.origin