import * as HelperModule from './../helper-module'

const nav = document.querySelector('nav')
const btnOpenMenu = document.querySelector('.nav__toggle-menu')
const navUl = nav.querySelector('.nav__ul')
const dividerMenu = ['divide-y', 'divide-gray-400'] //ini class buat nambah border ke menu
const elementOnHeaderExceptNav = document.querySelectorAll('header nav + *')

const closeNav = () => {
    nav.classList.remove('nav--open')
    navUl.classList.remove(...dividerMenu)
}

const openNav = () => {
    nav.classList.add('nav--open')
    navUl.classList.add(...dividerMenu)
}

const closeAllMenu = () => {
    closeNav()

    const allChild = document.querySelectorAll('.nav__item-has-child--open')
    
    allChild.forEach(child => {
        child.classList.remove('nav__item-has-child--open')
    })
}

btnOpenMenu.addEventListener('click', () => {
    if (nav.classList.contains('nav--open')) {
        closeNav()
    }
    else {
        openNav()
    }
});

if (HelperModule.pageUrl === '/') {
    nav.classList.add('bg-gray-800', 'bg-opacity-25')
}
else {
    nav.classList.add('lg:border-b', 'border-gray-400');
}

if (elementOnHeaderExceptNav.length > 0) {
    document.querySelector('header nav + *').addEventListener('click', () => {
        closeAllMenu()
    });
}

const btnOpenChildMenu = document.querySelectorAll('.nav__link--open-child')
const classToOpenNavItemHasChild = 'nav__item-has-child--open'
btnOpenChildMenu.forEach(openChild => {
    const parentOfBtnOpenChild = openChild.parentNode.classList

    openChild.addEventListener('click', (e) => {
        e.preventDefault()

        const siblingsChild = HelperModule.getSiblings(openChild.parentNode);

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
})

document.querySelector('main').addEventListener('click', () => {
    closeAllMenu();
})