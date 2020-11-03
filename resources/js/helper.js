/*!
 * Get all siblings of an element
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 */
const getSiblings = function (elem) {
	return Array.prototype.filter.call(elem.parentNode.children, function (sibling) {
		return sibling !== elem;
	});
};


/*
	formatting currency to rupiah
*/
const formattingRupiah = function (currency) {
	return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(currency).replace(',00', '');
};

/*
 * Make all input lowercase
 */
const inputElement = document.querySelectorAll(".input-lowercase")
inputElement.forEach(function(input) {
    input.addEventListener('input', () => input.value = input.value.toLowerCase());
    input.addEventListener('change', () => console.log(input.value));
});

const setAttributes = (el, attrs) => {
	for(let key in attrs) {
		el.setAttribute(key, attrs[key]);
	}
}

const inputOnlyNumberAndSpace = document.querySelectorAll('.only-alpha-space');
inputOnlyNumberAndSpace.forEach(input => {
	input.setAttribute('pattern', '[a-zA-Z][a-zA-Z ]+ ');
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
	money.textContent = formattingRupiah(money.textContent)
});

export {getSiblings, inputElement, setAttributes, inputOnlyNumberAndSpace, requiredInput, rupiahCurrency, formattingRupiah};