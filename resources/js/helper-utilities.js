import * as Helper from './helper-module.js'

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
	money.textContent = Helper.formattingRupiah(money.textContent)
});

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