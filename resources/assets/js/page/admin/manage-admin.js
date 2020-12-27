import * as HelperModule from './../../helper-module'

if (HelperModule.pageUrl === '/superadmin/admins') {
    const manageAdminPage = document.querySelector("#manageAdminPage")
    const totalError = manageAdminPage.querySelectorAll('.invalid-feedback').length
    
    if (totalError > 0) { //if there's an error when add/update admin acc
        $("#addNewAdmin").modal('show')
    }

    const urlFormAdmin = 'superadmin/admins'
    const btnEditAdmin = manageAdminPage.querySelectorAll('.btn-edit-admin')
    let adminId, adminName, adminEmail, adminPhone, adminJoinedAt

    btnEditAdmin.forEach(btn => {
        btn.addEventListener('click', () => {
            adminId = btn.dataset.adminId
            adminName = btn.closest('.admin').querySelector('.admin__name').dataset.adminName.trim()
            adminEmail = btn.closest('.admin').querySelector('.admin__email').textContent.trim()
            adminPhone = btn.closest('.admin').querySelector('.admin__phone').textContent.trim()
            adminJoinedAt = btn.closest('.admin').querySelector('.admin__joined-at').textContent.trim()

            HelperModule.setFormAction('#form-edit-admin', `${appUrl}/${urlFormAdmin}/${adminId}`)
        });
    })

    HelperModule.setFormAction('#form-add-admin', `${appUrl}/${urlFormAdmin}`)
    
}