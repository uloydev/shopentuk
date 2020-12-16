import { pageUrl, openCloseModal, getParents } from './../helper-module'

const metaToken = document.querySelector('meta[name="csrf-token"]').content

if (pageUrl === '/cart') {
    const cartPage = document.querySelector('#cartPage')

    /**
     * set icon color when btn #btn-back hovered
     */
    const backToPrevBtn = document.querySelector('#btn-back')
    const icon = backToPrevBtn.querySelector('box-icon')
    const iconOriginalColor = icon.getAttribute('color')
    backToPrevBtn.addEventListener('mouseover', () => {
        icon.setAttribute('color', '#fff')
    })
    backToPrevBtn.addEventListener('mouseleave', () => {
        icon.setAttribute('color', iconOriginalColor)
    })

    // modal checkout and it's child
    if (cartPage.querySelector('#modalCheckout')) {
        const modalCheckout = document.querySelector('#modalCheckout')
        const firstStep = modalCheckout.querySelector('.step-form > form')
        const secondStep = modalCheckout.querySelector('.step-form > div')
        const nextStepBtn = modalCheckout.querySelector('#btnNextStep')
        const checkoutBtn = modalCheckout.querySelector('#btnCheckout')

        // open modal checkout
        const btnShowCheckoutStep = document.querySelector('#btnShowCheckoutStep')
        btnShowCheckoutStep.addEventListener('click', () => {
            openCloseModal('#modalCheckout')
        })
    
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
            if (nextStepBtn.classList.contains('hidden')) {
                nextStepBtn.classList.remove('hidden')
                checkoutBtn.classList.add('hidden')
            }
        });
    
        /*
          * open #modalAddAddress if it closed. Otherwise close it
          */
        const btnOpenModalAddress = document.querySelector('.btn-open-close-modal-address')
        const btnCloseModalAddress = document.querySelector('#btn-close-modalAddAddress')
        const btnsManageModalAddress = [btnOpenModalAddress, btnCloseModalAddress]
        
        btnsManageModalAddress.forEach(btnOnModalAddNewAddress => {
            btnOnModalAddNewAddress.addEventListener('click', () => {
                openCloseModal('#modalAddAddress')
            })
        })

        // Modal.openCloseModalAddress()
    
        /*
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
    
            let data = new FormData(newAddressForm);

            fetch(newAddressForm.getAttribute('action'), {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
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
            })
            .catch(error => {
                console.error(error)
            })

            openCloseModal('#modalAddAddress')
            
        });
    }

    function updateCart(cartItems) {
        const weightTotalElement = cartPage.querySelector('#cart__weight-total');
        const totalPointElement = cartPage.querySelectorAll('#cart__total-point')
        const totalMoneyElement = cartPage.querySelectorAll('#cart__total-money')
        const cartShipping = cartPage.querySelectorAll('#cart__shipping');
        const isShippingPoint = cartPage.querySelectorAll('.cart-item__price[data-is-point="false"]').length == 0;
        const selectAddress = cartPage.querySelector('select[name="address_id"]');
        const addressLabel = cartPage.querySelectorAll('#isJavaAddress');

        let isJavaAddress = false;
        if (selectAddress.value !== "") {
            const selectedAddress = selectAddress.querySelector(`option[value="${selectAddress.value}"]`)
            isJavaAddress = selectedAddress.dataset.isJava == 1 ? true : false;
        }

        let totalPoint = 0;
        let totalMoney = 0;
        let weight = 0;
        let shippingTotal = 0;
        cartItems.forEach(item => {
            const itemPrice = item.previousElementSibling;
            weight += itemPrice.dataset.weight * item.value;
            if (itemPrice.dataset.isPoint === 'true') {
                totalPoint += itemPrice.dataset.price * item.value;
            } else {
                totalMoney += itemPrice.dataset.price * item.value;
            }
        })
        if (isJavaAddress) {
            shippingTotal = cartShipping[0].dataset.price * Math.ceil(weight / 1000)
            addressLabel.forEach(item => {
                item.textContent = "jawa";
            })
        } else {
            shippingTotal = cartShipping[0].dataset.nonJavaPrice * Math.ceil(weight / 1000)
            addressLabel.forEach(item => {
                item.textContent = "luar jawa";
            })
        }
        if (isShippingPoint) {
            cartShipping.forEach(item => {
                item.textContent = Math.ceil(shippingTotal / cartShipping[0].dataset.pointValue) + ' point'

            })
        } else {
            cartShipping.forEach(item => {
                item.textContent = 'Rp. ' + shippingTotal

            })
        }

        if (voucher) {
            totalMoney -= voucher.discount_value;
            totalMoney = totalMoney > 0 ? totalMoney : 0
        }

        totalPointElement.forEach(item => {
            item.textContent = totalPoint + ' point';
        })
        totalMoneyElement.forEach(item => {
            item.textContent = 'Rp. ' + totalMoney;
        });
        weightTotalElement.textContent = weight + ' gram';
    }

    // check voucher
    const checkoutVoucherInput = cartPage.querySelector('input[name="voucher"]');
    const checkVoucherBtn = cartPage.querySelector('#btnCheckVoucher');
    const voucherInput = cartPage.querySelector('input[name="voucher_code"]');
    const voucherElement = cartPage.querySelector('#cart__voucher-discount');
    let voucher = null;
    let cartItems = cartPage.querySelectorAll('.cart-item__qty');
    const cartId = cartPage.querySelector('#cartId').value

    if (voucherInput) {
        checkVoucherBtn.addEventListener('click', () => {
            if (voucherInput.value != "") {
                fetch('/voucher/validate' , {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-Token': metaToken,
                    },
                    body: JSON.stringify({'voucher_code': voucherInput.value}),
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.status == 'success') {
                        voucher = data.data;
                        voucherElement.textContent = 'Rp. ' + voucher.discount_value;
                        checkoutVoucherInput.value = voucher.code;
                    } else {
                        voucher = null;
                        voucherElement.textContent = 'Rp. 0';
                        checkoutVoucherInput.value = '';
                    }
                    updateCart(cartItems);
                });
            }
        });
    }

    // update cart
    if (cartItems.length > 0) {
        updateCart(cartItems);

        // address select input change listener
        cartPage.querySelector('select[name="address_id"]').addEventListener('change', () => updateCart(cartItems));

        // cart item event listener
        cartItems.forEach((item, index) => {
            item.addEventListener('change', () => {
                const itemPrice = item.previousElementSibling;
                if (item.value == 0) {
                    if (window.confirm('Anda yakin ingin menghapus produk dari cart ?')) {
                        fetch(`/cart/${cartId}` , {
                            method: 'DELETE',
                            headers: {
                                'Content-type': 'application/json',
                                'X-CSRF-Token': metaToken,
                            },
                            body: JSON.stringify({'item_id': item.dataset.itemId}),
                        })
                        .then(() => {
                            getParents(item, '.cart-item')[0].remove()
                            if (!cartPage.querySelector('.cart-item__qty')) {
                                location.reload();
                            }
                        });
                    } else {
                        item.value = 1
                    }
                }
                if (itemPrice.dataset.isPoint === 'true') {
                    itemPrice.textContent = `${itemPrice.dataset.price * item.value} point`;
                } else {
                    itemPrice.textContent = `Rp. ${itemPrice.dataset.price * item.value}`;
                }
                let boughtItems = [];
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
                .then(() => updateCart(cartItems));
            });
        });
    }
}