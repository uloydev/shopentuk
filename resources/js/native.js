import 'boxicons'
import * as Helper from './helper.js'

const btnOpenMenu = document.querySelector('.nav__toggle-menu')
const btnOpenChildMenu = document.querySelectorAll('.nav__link--open-child')
const nav = document.querySelector('nav')
const navUl = nav.querySelector('.nav__ul')
const dividerMenu = ['divide-y', 'divide-gray-400'] //ini class buat nambah border ke menu
const classToOpenNavItemHasChild = 'nav__item-has-child--open'
const pageUrl = window.location.pathname
const elementOnHeaderExceptNav = document.querySelectorAll('header nav + *')

function closeNav() {
    nav.classList.remove('nav--open')
    navUl.classList.remove(...dividerMenu)
}

function openNav() {
    nav.classList.add('nav--open')
    navUl.classList.add(...dividerMenu)
}

function closeAllMenu() {
    const allChild =  document.querySelectorAll('.nav__item-has-child--open')
    
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
if (pageUrl === '/payment/cart') {
    const cartPrices = document.querySelectorAll('.cart-item__price')
    const allPrice = Array.from(cartPrices).map(price => Number(price.dataset.price))
    const totalPriceWithoutShipping = allPrice.reduce((acc, val) => acc + val)

    const cartSubTotal = document.querySelector('#cart__sub-total')
    cartSubTotal.textContent = Helper.formattingRupiah(totalPriceWithoutShipping);

    const cartShipping = Number(document.querySelector('#cart__shipping').dataset.price);

    const cartGrandTotal = document.querySelector('#cart__total')
    cartGrandTotal.textContent = Helper.formattingRupiah(cartShipping + totalPriceWithoutShipping);

}
//plugin js
if (document.querySelector('[data-tabs]')) {
    new Tabby('[data-tabs]')
}