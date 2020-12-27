import * as HelperModule from "../../helper-module";
const numWords = require('num-words')

if (HelperModule.pageUrl === '/admin/order') {
    const manageOrderPage = document.querySelector('#manageOrderPage')
    const orderItem = manageOrderPage.querySelectorAll('.order-item')

    orderItem.forEach((currentItem, index) => {
        const indexToWord = HelperModule.capitalizeFirstLetter(numWords(Number(index) + 1))
        
        HelperModule.setAttributes(document.querySelectorAll('.order-item__btn')[index], {
            'href': `#collapse${indexToWord}`,
            'aria-controls': `#collapse${indexToWord}`
        })
        
        HelperModule.setAttributes(document.querySelectorAll('.order-item__detail')[index], {
            'id': `collapse${indexToWord}`,
            'aria-labelledby': `heading${indexToWord}`
        })
        
    });
}