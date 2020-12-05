import { pageUrl, openCloseModal } from './../helper-module'

const metaToken = document.querySelector('meta[name="csrf-token"]').content

if (pageUrl === '/cart') {
    const cartPage = document.querySelector('#cartPage')

    // modal checkout and it's child
    if (cartPage.querySelector('#modalCheckout')) {
        const modalCheckout = cartPage.querySelector('#modalCheckout')
        const firstStep = modalCheckout.querySelector('.step-form > form')
        const secondStep = modalCheckout.querySelector('.step-form > div')
        const nextStepBtn = modalCheckout.querySelector('#btnNextStep')
        const checkoutBtn = modalCheckout.querySelector('#btnCheckout')

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
            if (textBtn == "Next"){

            }

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
            // setNextStepBtnText('Next')


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
            

            if (modalCheckout.querySelector('select').value == '') {
                alert('kamu belum pilih alamat pengiriman!')
            }
            else {
                openStep(secondStep)
                closeStep(firstStep)
                nextStepBtn.classList.add('hidden')
                checkoutBtn.classList.remove('hidden')
            }
            // setNextStepBtnText('Checkout')
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

    // update cart
    if (cartPage.querySelector('#updateCartBtn')) {
        const updateCartBtn = cartPage.querySelector('#updateCartBtn')
        const cartId = updateCartBtn.dataset.cartId

        updateCartBtn.addEventListener('click', () => {
            let boughtItems = [];
            const cartItems = cartPage.querySelectorAll('.cart-item__qty');
            cartItems.forEach(item => {
                boughtItems.push({
                    'item_id': item.dataset.itemId,
                    'quantity': item.value,
                });
            });
            fetch(`/cart/${cartId}` , {
                    method: 'PUT',
                    headers: {
                        'Content-type': 'application/json',
                        'X-CSRF-Token': metaToken,
                    },
                    body: JSON.stringify(boughtItems),
            })
            .then(() => location.reload());
        });
    }

}