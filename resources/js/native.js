import 'boxicons'
import './helper-utilities.js'
import * as HelperModule from './helper-module.js'

const btnOpenMenu = document.querySelector('.nav__toggle-menu')
const btnOpenChildMenu = document.querySelectorAll('.nav__link--open-child')
const nav = document.querySelector('nav')
const navUl = nav.querySelector('.nav__ul')
const dividerMenu = ['divide-y', 'divide-gray-400'] //ini class buat nambah border ke menu
const classToOpenNavItemHasChild = 'nav__item-has-child--open'
const pageUrl = window.location.pathname
const elementOnHeaderExceptNav = document.querySelectorAll('header nav + *')

const closeNav =  () => {
    nav.classList.remove('nav--open')
    navUl.classList.remove(...dividerMenu)
}

const openNav = () => {
    nav.classList.add('nav--open')
    navUl.classList.add(...dividerMenu)
}

const closeAllMenu = () => {
    const allChild = document.querySelectorAll('.nav__item-has-child--open')
    
    allChild.forEach(child => {
        child.classList.remove('nav__item-has-child--open')
    });

    closeNav()
}

btnOpenMenu.addEventListener('click', () => {
    if (nav.classList.contains('nav--open')) {
        closeNav()
    }
    else {
        openNav()
    }
});

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

});

if (elementOnHeaderExceptNav.length > 0) {
    document.querySelector('header nav + *').addEventListener('click', () => {
        closeAllMenu()
    });
}

document.querySelector('main').addEventListener('click', () => {
    closeAllMenu();
});

if (pageUrl === '/') {
    nav.classList.add('bg-gray-800', 'bg-opacity-25')
    document.querySelector('header, main').classList.remove('bg-gray-100')

    //jika lg di landing page dan di mode tablet keatas, icon menu ganti warna jd putih
    if (window.screen.width > 768) {
        document.querySelectorAll('.nav .container > .nav__ul > .nav__item > .nav__link > .child-dropdown-icon')
        .forEach(dropdownIcon => {
            dropdownIcon.setAttribute('color', '#fff')
        });
    }
}
else {
    nav.classList.add('lg:border-b', 'border-gray-400');
}

//auth page script
if (pageUrl === '/login') {
    const authPage = document.querySelector('#authPage')
    const formRegister = authPage.querySelector('#form-daftar')
    const formLogin = authPage.querySelector('#form-masuk')

    formRegister.addEventListener('submit', function () {
        localStorage.clear()
        localStorage.setItem('sessionFailed', 'regist')
    });

    formLogin.addEventListener('submit', function () {
        localStorage.clear()
        localStorage.setItem('sessionFailed', 'login')
    });

    function removeValidationOnFalseForm(falseForm) {
        const falseErrorMessage = falseForm.querySelectorAll('.error-message')
        const falseErrorInput = falseForm.querySelectorAll('.border-red-400')

        Array.from(falseErrorMessage).map(error => {
            error.remove();
        });
        Array.from(falseErrorInput).map(input => {
            input.value = null;
            input.classList.remove('border-red-400');
        });
    }

    if (localStorage.getItem('sessionFailed') === 'regist') {
        removeValidationOnFalseForm(formLogin)
    } else if (localStorage.getItem('sessionFailed') === 'login') {
        removeValidationOnFalseForm(formRegister)
    }
}

//cart js

// customer dashboard js
if (pageUrl.indexOf('/my-account') > -1) {
    const tabsMenu = document.querySelectorAll('.change-menu-btn')
    const pageUrlWithoutProtocol = window.location.href.replace(window.location.protocol, '')

    tabsMenu.forEach(menu => {
        const tabLinkMenu = menu.getAttribute('href')
        console.log(tabLinkMenu)
        if (tabLinkMenu === pageUrlWithoutProtocol) {
            menu.classList.add('text-blue-500', 'border-b', 'border-blue-500')
            menu.classList.remove('text-gray-600')
        }
    });

    if (pageUrl === '/my-account/point') {
        const pointQty = Array.from(document.querySelectorAll('.point-item__qty')).map(point => {
            return Number(point.textContent)
        })
        
        const pointTotal = pointQty.reduce((acc, val) => acc + val)
        document.querySelector('.point-item__total').textContent = pointTotal
        
    }
    
}

if (pageUrl === '/cart') {
    const cartPage = document.querySelector('#cartPage')
    const openCloseModal = (modalSelector) => {
        const modalEl = cartPage.querySelector(modalSelector)
        const classToCloseModal = ['invisible', 'h-0', 'opacity-0']
        const isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
        
        if (isModalOpen === true) {
            modalEl.classList.remove(...classToCloseModal)
        }
        else {
            modalEl.classList.add(...classToCloseModal)
        }
    }

    const modalCheckout = cartPage.querySelector('#modal')
    const firstStep = modalCheckout.querySelector('.step-form > form')
    const secondStep = modalCheckout.querySelector('.step-form > div')
    const nextStepBtn = modalCheckout.querySelector('.next-step')

    const btnShowCheckoutStep = cartPage.querySelector('#btnShowCheckoutStep')
    btnShowCheckoutStep.addEventListener('click', () => {
        openCloseModal('#' + modalCheckout.getAttribute('id'))
    })

    const addressUser = firstStep.querySelector('textarea')
    addressUser.addEventListener('change', () => {
        nextStepBtn.disabled = addressUser.value.trim() !== '' ? false : true
    })

    function setNextStepBtnText(textBtn) {
        nextStepBtn.textContent = textBtn
    }

    const btnCloseModal = cartPage.querySelector('#closeModal')
    btnCloseModal.addEventListener('click', () => {
        openCloseModal('#' + modalCheckout.getAttribute('id'))

        firstStep.classList.add('show-step')
        firstStep.classList.remove('hide-step')

        secondStep.classList.add('hide-step')
        secondStep.classList.remove('show-step')

        setNextStepBtnText('Next')
    })

    
    nextStepBtn.addEventListener('click', () => {
        secondStep.classList.add('show-step')
        secondStep.classList.remove('hide-step')

        firstStep.classList.add('hide-step')
        firstStep.classList.remove('show-step')

        setNextStepBtnText('Checkout')
    })
}

//plugin js
if (document.querySelector('[data-tabs]')) {
    new Tabby('[data-tabs]')
}

//general js

