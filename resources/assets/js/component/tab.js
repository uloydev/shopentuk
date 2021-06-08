import * as HelperModule from './../helper-module.js'

const tabsMenu = document.querySelectorAll('.tab-link')
const pageUrlWithoutProtocol = HelperModule.getUrlWithoutProtocol(window.location.href)
if (tabsMenu.length > 0) {
    tabsMenu.forEach(menu => {
        const tabLinkMenu = HelperModule.getUrlWithoutProtocol(menu.getAttribute('href'))
        console.log(pageUrlWithoutProtocol)
        if (tabLinkMenu === pageUrlWithoutProtocol) {
            menu.classList.add('text-blue-500', 'bg-gray-100')
            menu.classList.remove('text-gray-600')
        }
    });
}