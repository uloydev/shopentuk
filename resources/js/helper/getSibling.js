/*!
 * Get all siblings of an element
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Node}  elem The element
 * @return {Array}      The siblings
 */
const getSiblings = function (elem) {
	return Array.prototype.filter.call(elem.parentNode.children, function (sibling) {
		return sibling !== elem;
	});
};

export {getSiblings};