import { openCloseModalAddress } from '../component/modal.js';
import * as HelperModule from './../helper-module.js'

if (HelperModule.pageUrl.indexOf('/my-account') > -1) {
    const tabsMenu = document.querySelectorAll('.dashboard-customer__menu-link')
    const pageUrlWithoutProtocol = HelperModule.getUrlWithoutProtocol(window.location.href)
    
    tabsMenu.forEach(menu => {
        const tabLinkMenu = HelperModule.getUrlWithoutProtocol(menu.getAttribute('href'))
        if (tabLinkMenu === pageUrlWithoutProtocol) {
            menu.classList.add('text-blue-500', 'bg-gray-100')
            menu.classList.remove('text-gray-600')
        }
    });

    // script on '/my-account/point' page
    if (HelperModule.pageUrl === '/my-account/point') {
        //collecting each point and sum-ing it
        const pointQty = Array.from(document.querySelectorAll('.point-item__qty')).map(point => {
            return Number(point.textContent)
        })
        
        const pointTotal = pointQty.reduce((acc, val) => acc + val)
        document.querySelector('.point-item__total').textContent = pointTotal
    }

    if (HelperModule.pageUrl === '/my-account/detail') {
        openCloseModalAddress()
    }
    
}