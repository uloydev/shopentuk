import * as HelperModule from '../../helper-module'

if (HelperModule.pageUrl === '/admin/manage-customer') {
    const modalEditUser = document.querySelector('#modalEditUser');
    const formEditUser = modalEditUser.querySelector('form');
    const modalEditUserlabel = document.querySelector('#modalEditUserLabel');

    const inputPhone = modalEditUser.querySelector('#inputPhone');
    const inputPemilikRekening = modalEditUser.querySelector('#inputPemilikRekening');
    const inputBank = modalEditUser.querySelector('#inputBank');
    const inputRekening = modalEditUser.querySelector('#inputRekening');

    const editUserButtons = document.querySelectorAll('.btn-edit-user');
    editUserButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            modalEditUserlabel.textContent = 'Edit Data User ' + this.dataset.userEmail;
            inputPhone.value = this.dataset.userPhone;
            inputPemilikRekening.value = this.dataset.userPemilikRekening;
            inputBank.value = this.dataset.userBank;
            inputRekening.value = this.dataset.userRekening;
            formEditUser.action = this.dataset.updateUrl;
        });
    });



}