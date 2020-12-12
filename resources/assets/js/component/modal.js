import * as HelperModule from "../helper-module"

export const openCloseModalAddress = () => {
    if (document.querySelectorAll('.btn-open-close-modal-address')) {
        const btnAddNewAddress = document.querySelectorAll('.btn-open-close-modal-address')
        btnAddNewAddress.forEach(btn => {
            btn.addEventListener('click', () => {
                HelperModule.openCloseModal('#modalAddAddress')
            })
        })
    }
    if (document.querySelectorAll('.btn-edit-addresss')) {
        const btnEditAddress = document.querySelectorAll('.btn-edit-addresss')
        btnEditAddress.forEach(btnEdit => {
            btnEdit.addEventListener('click', () => {
                console.log('edit address')
            })
        })
    }
}
