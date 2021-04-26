import * as HelperModule from './../../helper-module'

if (HelperModule.pageUrl === '/superadmin/admins') {
    $('.btn-delete-admin').click(function () {
        var adminId = $(this).data('adminId');
        $('#modalConfirmDelete').data('adminId', adminId);
        $('#modalConfirmDelete').modal('show');
    });

    $('#confirmDeleteBtn').click(function () {
        var adminId = $('#modalConfirmDelete').data('adminId');
        console.log('ok')
        $('#formDelete' + adminId).submit();
    });

    const manageAdminPage = document.querySelector("#manageAdminPage")
    const totalError = manageAdminPage.querySelectorAll('.invalid-feedback').length
    
    if (totalError > 0) { //if there's an error when add/update admin acc
        $("#addNewAdmin").modal('show')
    }

    const urlFormAdmin = 'superadmin/admins'
    const btnEditAdmin = manageAdminPage.querySelectorAll('.btn-edit-admin')
    let adminId, adminName, adminEmail, adminPhone, adminJoinedAt
    let formEdit = document.querySelector('#form-edit-admin');
    btnEditAdmin.forEach(btn => {
        btn.addEventListener('click', () => {
            adminId = btn.dataset.adminId
            adminName = btn.closest('.admin').querySelector('.admin__name').dataset.adminName.trim()
            adminEmail = btn.closest('.admin').querySelector('.admin__email').textContent.trim()
            adminPhone = btn.closest('.admin').querySelector('.admin__phone').textContent.trim()
            HelperModule.setFormAction('#form-edit-admin', `${location.host}/${urlFormAdmin}/${adminId}`)
            formEdit.querySelector('#admin-name').value = adminName;
            formEdit.querySelector('#admin-email').value = adminEmail;
            formEdit.querySelector('#admin-phone').value = adminPhone;
        });
    })

    HelperModule.setFormAction('#form-add-admin', `${location.host}/${urlFormAdmin}`)
    
}