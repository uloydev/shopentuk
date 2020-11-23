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
const metaToken = document.querySelector('meta[name="csrf-token"]').content

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

// customer dashboard js
if (pageUrl.indexOf('/my-account') > -1) {
    const tabsMenu = document.querySelectorAll('.change-menu-btn')
    const pageUrlWithoutProtocol = HelperModule.getUrlWithoutProtocol(window.location.href)
    

    tabsMenu.forEach(menu => {
        const tabLinkMenu = HelperModule.getUrlWithoutProtocol(menu.getAttribute('href'))
        if (tabLinkMenu === pageUrlWithoutProtocol) {
            menu.classList.add('text-blue-500', 'border-b', 'border-blue-500')
            menu.classList.remove('text-gray-600')
        }
    });

    if (pageUrl === '/my-account/point') {
        //collecting each point and sum-ing it
        const pointQty = Array.from(document.querySelectorAll('.point-item__qty')).map(point => {
            return Number(point.textContent)
        })
        
        const pointTotal = pointQty.reduce((acc, val) => acc + val)
        document.querySelector('.point-item__total').textContent = pointTotal
        //end of that   
    }
    
}

// cart page js
if (pageUrl === '/cart') {
    const cartPage = document.querySelector('#cartPage')

    /**
     * function to open modal if modal closed, 
     * close modal if modal opened
     */
    const openCloseModal = (modalSelector) => {
        const modalEl = document.querySelector(modalSelector)
        const classToCloseModal = ['invisible', 'h-0', 'opacity-0']

        // if modal open, set isModalOpen = true. else, isModalOpen = false
        const isModalOpen = modalEl.classList.contains(...classToCloseModal) ? true : false
        
        if (isModalOpen === true) {
            // close modal
            modalEl.classList.remove(...classToCloseModal)
        }
        else {
            // open modal
            modalEl.classList.add(...classToCloseModal)
        }
    }

    // modal checkout and it's child
    if (cartPage.querySelector('#modalCheckout')) {
        const modalCheckout = cartPage.querySelector('#modalCheckout')
        const firstStep = modalCheckout.querySelector('.step-form > form')
        const secondStep = modalCheckout.querySelector('.step-form > div')
        const nextStepBtn = modalCheckout.querySelector('.next-step')

        // open modal checkout
        const btnShowCheckoutStep = cartPage.querySelector('#btnShowCheckoutStep')
        btnShowCheckoutStep.addEventListener('click', () => {
            openCloseModal('#' + modalCheckout.getAttribute('id'))
        })
    
        /*
         * change '.next-step' text
        */
        function setNextStepBtnText(textBtn) {
            nextStepBtn.textContent = textBtn
        }
    
        /*
         * open step on checkout modal
         */
        function openStep(step) {
            step.classList.add('show-step')
            step.classList.remove('hide-step')
        }
        /**
         * close step on checkout modal
         */
        function closeStep(step) {
            step.classList.add('hide-step')
            step.classList.remove('show-step')
        }
    
        const btnCloseModal = cartPage.querySelector('#closeModalCheckout')
        // when user close the modal
        btnCloseModal.addEventListener('click', () => {
            openCloseModal('#' + modalCheckout.getAttribute('id'))
            openStep(firstStep)
            closeStep(secondStep)
            setNextStepBtnText('Next')
        });
    
        // each btn to manage modal address
        const btnOpenModalAddress = cartPage.querySelector('#add-new-address-btn')
        const btnCloseModalAddress = cartPage.querySelector('#btn-close-modalAddNewAddress')
        const btnsManageModalAddress = [btnOpenModalAddress, btnCloseModalAddress]
        
        /**
         * when one of btnsManageModalAddress is click, 
         * open modal if it closed. Otherwise close it
         */
        btnsManageModalAddress.forEach(btnOnModalAddNewAddress => {
            btnOnModalAddNewAddress.addEventListener('click', () => {
                openCloseModal('#modalAddNewAddress')
            })
        })
    
        /**
         * when user go to next step on checkout
         */
        nextStepBtn.addEventListener('click', () => {
            openStep(secondStep)
            closeStep(firstStep)
            setNextStepBtnText('Checkout')
        })
    
        const newAddressBtn = document.querySelector('#newAddressSubmit');
        const newAddressForm = document.querySelector('#newAddressForm');
        const addresses = cartPage.querySelector('#form-checkout select');

        newAddressForm.addEventListener('submit', (e) => {
    
            e.preventDefault()
            newAddressBtn.disabled = true;
    
            let data = new FormData(newAddressForm);
            fetch(newAddressForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'X-CSRF-Token': metaToken,
                    },
                    body: JSON.stringify(Object.fromEntries(data)),
                })
                .then(res => res.json())
                .then(json => {

                    addresses.innerHTML = ''
                    for (const [key, value] of Object.entries(json)) {
                        addresses.innerHTML += `
                        <option value="${value.id}">
                            ${value.title}
                        </option>
                        `
                    }
                    
                    
                    openCloseModal('#modalAddNewAddress')
    
                });
            newAddressBtn.disabled = false;
        });
    }
    

}

//plugin js
if (document.querySelector('[data-tabs]')) {
    new Tabby('[data-tabs]')
}

//general js

