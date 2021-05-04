import * as HelperModule from "../../helper-module"

if (HelperModule.pageUrl === '/admin/payment') {
    const modalDetail = document.querySelector('#modalShowDetail');
    const btnOpenDetailModal = document.querySelectorAll('.btn[data-target="#modalShowDetail"]');
    const updatePaymentForm = modalDetail.querySelector('#updatePaymentForm');
    const acceptOrderBtn = modalDetail.querySelector('#acceptOrderBtn');
    const rejectPaymentBtn = modalDetail.querySelector('#rejectPaymentBtn');

    const orderId = modalDetail.querySelector('#orderId');
    const orderDate = modalDetail.querySelector('#orderDate');
    const orderStatus = modalDetail.querySelector('#orderStatus');
    const orderTotal = modalDetail.querySelector('#orderTotal');
    const paymentName = modalDetail.querySelector('#paymentName');
    const paymentDate = modalDetail.querySelector('#paymentDate');
    const paymentPhone = modalDetail.querySelector('#paymentPhone');
    const paymentMethod = modalDetail.querySelector('#paymentMethod');
    const paymentImage = modalDetail.querySelector('#paymentImage');
    const paymentImageDownload = modalDetail.querySelector('#paymentImageDownload');
    
    btnOpenDetailModal.forEach(function (btn) {
        btn.addEventListener('click', function () {
            orderId.textContent = this.dataset.orderId;
            orderDate.textContent = this.dataset.orderDate;
            orderStatus.textContent = this.dataset.orderStatus;
            orderTotal.textContent = this.dataset.orderTotal;
            paymentName.textContent = this.dataset.paymentName;
            paymentDate.textContent = this.dataset.paymentDate;
            paymentPhone.textContent = this.dataset.paymentPhone;
            paymentMethod.textContent = this.dataset.paymentMethod;
            paymentImage.src = this.dataset.paymentImage;
            paymentImageDownload.href = this.dataset.paymentImage;
            updatePaymentForm.action = this.dataset.updateUrl;
        });
    });

    acceptOrderBtn.addEventListener('click', function () {
        updatePaymentForm.querySelector('input[name="is_accepted"]').value = 1;
        updatePaymentForm.submit();
    });

    rejectPaymentBtn.addEventListener('click', function () {
        updatePaymentForm.querySelector('input[name="is_accepted"]').value = 0;
        updatePaymentForm.submit();
    });


}