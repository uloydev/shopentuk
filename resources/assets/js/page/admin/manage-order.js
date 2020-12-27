import { pageUrl, setAttributes } from "../../helper-module";
const numWords = require('num-words')

if (pageUrl === '/admin/order') {
    const manageOrderPage = document.querySelector('#manageOrderPage')
    const orderItem = manageOrderPage.querySelectorAll('.order-item')

    orderItem.forEach((currentItem, index) => {
        const indexToWord = capitalizeFirstLetter(numWords(Number(index) + 1))
        
        setAttributes(document.querySelectorAll('.order-item__btn')[index], {
            'href': `#collapse${indexToWord}`,
            'aria-controls': `#collapse${indexToWord}`
        })
        
        setAttributes(document.querySelectorAll('.order-item__detail')[index], {
            'id': `collapse${indexToWord}`,
            'aria-labelledby': `heading${indexToWord}`
        })
        
    });
}