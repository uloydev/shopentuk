import 'boxicons';
import * as Helper from './helper/getSibling.js';

const btnOpenMenu = document.querySelector('.nav__toggle-menu')
const btnOpenChildMenu = document.querySelectorAll('.nav__link--open-child')
const nav = document.querySelector('nav')
const navUl = nav.querySelector('.nav__ul')
const dividerMenu = ['divide-y', 'divide-gray-400']
const classToOpenNavItemHasChild = 'nav__item-has-child--open'

btnOpenMenu.addEventListener('click', () => {
    if (nav.classList.contains('nav--open')) {
        nav.classList.remove('nav--open')
        navUl.classList.remove(...dividerMenu)
    }
    else {
        nav.classList.add('nav--open');
        navUl.classList.add(...dividerMenu)
    }
});

btnOpenChildMenu.forEach(openChild => {
    const parentOfBtnOpenChild = openChild.parentNode.classList

    openChild.addEventListener('click', (e) => {
        e.preventDefault()

        const siblingsChild = Helper.getSiblings(openChild.parentNode);

        siblingsChild.forEach(eachSibling => {
            if (eachSibling.classList.contains(classToOpenNavItemHasChild)) {
                eachSibling.classList.remove(classToOpenNavItemHasChild);
            }
        });

        if (parentOfBtnOpenChild.contains(classToOpenNavItemHasChild)) {
            parentOfBtnOpenChild.remove(classToOpenNavItemHasChild)
        }
        else {
            parentOfBtnOpenChild.add(classToOpenNavItemHasChild)
        }
    })

});

if (window.screen.width > 768) {
    document.querySelectorAll('.nav .container > .nav__ul > .nav__item > .nav__link > .child-dropdown-icon')
    .forEach(dropdownIcon => {
        dropdownIcon.setAttribute('color', '#fff');
    });
}