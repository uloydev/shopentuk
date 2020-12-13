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

        // add new address
        document.querySelectorAll('.btn-open-close-modal-address').forEach(btnManageModal => {
            btnManageModal.addEventListener('click', () => {
                console.log('clicked')
                HelperModule.openCloseModal('#modalAddAddress')
            })
        })
        
        if (document.querySelectorAll('.btn-edit-addresss')) {
            const userAddresses = JSON.parse(document.querySelector('#userAddresses').textContent);
            const editAddressBtn = document.querySelectorAll('.btn-edit-address');
            // const newAddressBtn = document.querySelector('#newAddressBtn');
            const deleteAddressBtn = document.querySelectorAll('.btn-delete-address');
            const editAddressForm = document.querySelector('#editAddressForm');
            const deleteAddressForm = document.querySelector('#deleteAddressForm');
            const closeEditModalBtn = document.querySelector('#btn-close-modalEditAddress')
            
            const setValue = (field, val) => {
                editAddressForm.querySelector(field).value = val
            }
            const setChecked = (field, val) => {
                editAddressForm.querySelector(field).checked = val
            }
    
            editAddressBtn.forEach((btn) => {
                btn.addEventListener('click', () => {
                    let address = userAddresses.find((data) => {
                        return btn.parentElement.dataset.useraddressid == data.id
                    })
                    
                    const addressFieldsWithValue = {
                        'input#addressId': address.id,
                        'input#title': address.title,
                        'input#name': address.name,
                        'input#email': address.email,
                        'input#phone': address.phone,
                        'input#kelurahan': address.kelurahan,
                        'input#kecamatan': address.kecamatan,
                        'input#city': address.city,
                        'input#province': address.province,
                        'input#postal_code': address.postal_code,
                        'textarea#street_address': address.street_address
                    }

                    const addressFieldsIsChecked = {
                        'input#main1': address.is_main_address,
                        'input#main0': !address.is_main_address,
                    }

                    for (const addressField in addressFieldsWithValue) {
                        setValue(addressField, addressFieldsWithValue[addressField])
                    }
                    for (const addressIsChecked in addressFieldsIsChecked) {
                        setChecked(addressIsChecked, addressFieldsIsChecked)
                    }

                    /*
                    editAddressForm.querySelector('input#title').value = address.title
                    editAddressForm.querySelector('input#name').value = address.name
                    editAddressForm.querySelector('input#email').value = address.email
                    editAddressForm.querySelector('input#phone').value = address.phone
                    editAddressForm.querySelector('input#kelurahan').value = address.kelurahan
                    editAddressForm.querySelector('input#kecamatan').value = address.kecamatan
                    editAddressForm.querySelector('input#city').value = address.city
                    editAddressForm.querySelector('input#province').value = address.province
                    editAddressForm.querySelector('input#postal_code').value = address.postal_code
                    editAddressForm.querySelector('input#main1').checked = address.is_main_address
                    editAddressForm.querySelector('input#main0').checked = !address.is_main_address
                    editAddressForm.querySelector('textarea#street_address').value
                    = address.street_address
                    */
                    let formData = new FormData(editAddressForm)
                    console.log(Object.fromEntries(formData))
                    // please fix open modal
                    HelperModule.openCloseModal('#modalEditAddress')
                })
            })
    
            deleteAddressBtn.forEach(btn => {
                btn.addEventListener('click', () => {
                    deleteAddressForm
                    .querySelector('input[name="id"]')
                    .value = btn.parentElement.dataset.useraddressid
                    
                    deleteAddressForm.submit()
                })
            })
    
            closeEditModalBtn.addEventListener('click', () => {
                HelperModule.openCloseModal('#modalEditAddress')
            })
        }
    }
    
}