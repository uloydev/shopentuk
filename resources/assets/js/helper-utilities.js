import * as Helper from './helper-module.js'


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