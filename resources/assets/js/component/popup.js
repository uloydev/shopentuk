import * as HelperModule from './../helper-module.js'

const openPopups = document.querySelectorAll('.toggle-popup')
if (openPopups.length > 0) {
    openPopups.forEach(btnManageModal => {
        btnManageModal.addEventListener('click', () => {
            HelperModule.openCloseModal(btnManageModal.dataset.modalId)
        })
    })
}

const deleteAddressBtn = document.querySelectorAll('.btn-delete-address')
const openEditModalBtns = document.querySelectorAll('.btn-edit-address')

if (openEditModalBtns.length > 0) {
    const btnManageModalAddress = [
        ...openEditModalBtns,
        document.querySelector('#btn-close-modalEditAddress')
    ]
    const deleteAddressForm = document.querySelector('#deleteAddressForm')

    deleteAddressBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            deleteAddressForm
            .querySelector('input[name="id"]')
            .value = btn.parentElement.dataset.useraddressid
            
            deleteAddressForm.submit()
        })
    })

    btnManageModalAddress.forEach(btn => {
        btn.addEventListener('click', () => {
            HelperModule.openCloseModal('#modalEditAddress')
        })
    })
}