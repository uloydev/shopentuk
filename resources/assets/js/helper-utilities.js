import * as Helper from './helper-module.js'

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


/*
 * .input-lowercase utitlies to make all input lowercase
 */
const inputElement = document.querySelectorAll(".input-lowercase")
inputElement.forEach(function(input) {
    input.addEventListener('input', () => input.value = input.value.toLowerCase());
    input.addEventListener('change', () => console.log(input.value));
});

/**
 * .only-alpha-space utitlies to make all input have pattern with 
 * regex only allow alpha & space
 */
const inputOnlyNumberAndSpace = document.querySelectorAll('.only-alpha-space');
inputOnlyNumberAndSpace.forEach(input => {
	input.setAttribute('pattern', '[a-zA-Z]+');
});

/**
 * Make all input with required att, have a '*' icon in their label
 */
const requiredInput = document.querySelectorAll('input:not([type="radio"])[required="required"], textarea[required]');
Array.from(requiredInput).map(input => {
	return input.previousElementSibling.classList.add('required-input');
});

/**
 * utilities class helper for instant formatting to rupiah
 */
const rupiahCurrency = document.querySelectorAll('.rupiah-currency')
rupiahCurrency.forEach(money => {
	money.classList.add('not-italic')
	money.textContent = Helper.formattingRupiah(money.textContent)
});

/**
 *  Set box-icon component color just using tailwind text color class
 */
const boxIcons = document.querySelectorAll('box-icon')
boxIcons.forEach(boxIcon => {
    if (boxIcon.className.split(' ').some(color => /text-.*/.test(color))) {
        const colorIcon = getComputedStyle(boxIcon).color
        boxIcon.setAttribute('color', colorIcon)
    }
});

/*
 * trim all input value
 */
document.querySelectorAll('input, textarea').forEach(input => {
    const valueTrimmed = input.value.trim()
    input.value = valueTrimmed
});