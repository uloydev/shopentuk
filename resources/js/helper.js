/*!
 * Get all siblings of an element
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 */

const getSiblings = (elem) => {
	return Array.prototype.filter.call(elem.parentNode.children, (sibling) => {
		return sibling !== elem;
	});
};


/*
	formatting currency to rupiah
*/
const formattingRupiah = (currency) => {
	return new Intl.NumberFormat('id-ID', {
		style: 'currency', currency: 'IDR'
	}).format(currency).replace(',00', '');
};

/*
 * Make all input lowercase
 */
const inputElement = document.querySelectorAll(".input-lowercase")
inputElement.forEach(function(input) {
    input.addEventListener('input', () => input.value = input.value.toLowerCase());
    input.addEventListener('change', () => console.log(input.value));
});

const inputOnlyNumberAndSpace = document.querySelectorAll('.only-alpha-space');
inputOnlyNumberAndSpace.forEach(input => {
	input.setAttribute('pattern', '[a-zA-Z]+');
});

const requiredInput = document.querySelectorAll('[required="required"], textarea[required]');
Array.from(requiredInput).map(input => {
	return input.previousElementSibling.classList.add('required-input');
});

/**
 * utilities class helper for instant formatting to rupiah
 */
const rupiahCurrency = document.querySelectorAll('.rupiah-currency')

rupiahCurrency.forEach(money => {
	money.classList.add('not-italic')
	money.textContent = formattingRupiah(money.textContent)
});

/**
 * set form action
 */
const setFormAction = (form, url) => {
	document.querySelector(form).action = url
}

/**
 *  Set box-icon component color just using class
 */

const boxIcons = document.querySelectorAll('box-icon')
boxIcons.forEach(boxIcon => {
    if (boxIcon.className.split(' ').some(color => /text-.*/.test(color))) {
        const colorIcon = getComputedStyle(boxIcon).color
        boxIcon.setAttribute('color', colorIcon)
    }
});