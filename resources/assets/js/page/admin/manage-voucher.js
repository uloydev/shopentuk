import * as HelperModule from "../../helper-module"

if (HelperModule.pageUrl === '/admin/vouchers') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-voucher"]')

    btnOpenEditModal.forEach((btn) => {
        const voucher = btn.parentNode.parentNode

        btn.addEventListener('click', () => {

            document.querySelector('#modal-edit-voucher .modal-title').innerHTML =
            `edit voucher <b>${voucher.querySelector('.voucher-item__code').dataset.original}</b>`
            
            document.querySelector('#modal-edit-voucher form').action = btn.dataset.updateUrl

            document.querySelector('input[name="name"]').value = btn.dataset.voucherName
            document.querySelector('input[name="code"]').value = btn.dataset.voucherCode
            document.querySelector('input[name="discount_value"]').value = btn.dataset.voucherDiscountValue

        })
    })

}