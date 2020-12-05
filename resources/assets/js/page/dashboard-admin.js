import 'boxicons'
import { capitalizeFirstLetter, setAttributes } from './../helper-module'

const numWords = require('num-words')
const appUrl = window.location.origin;
const pageUrl = window.location.pathname

const logoutBtn = document.querySelector('#logoutBtn');
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('logout-form').submit();
});

// /admin/all-category page
if (pageUrl === '/admin/all-category') {
    const manageCategoryPage = document.querySelector('#manageCategoryPage')
    const editSubCategoryBtn = manageCategoryPage.querySelectorAll(".edit-sub-category-btn")
    const subCategoryFocused = ['border', 'border-primary', 'p-2']

    editSubCategoryBtn.forEach(btnEditSub => {
        const subcategoryTitle = btnEditSub.parentElement.querySelector('.subcategory__title')

        btnEditSub.addEventListener('click', () => {
            subcategoryTitle.classList.add(...subCategoryFocused)
            subcategoryTitle.setAttribute('contenteditable', true)
            subcategoryTitle.focus()
        });

        subcategoryTitle.addEventListener('focusout', () => {
            subcategoryTitle.setAttribute('contenteditable', false)
            subcategoryTitle.classList.remove(...subCategoryFocused)

            //ksh ajax disini ntar buat save perubahan di subcategory nya
        });
    })
}

if (pageUrl === '/superadmin/admins') {
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

            setFormAction('#form-edit-admin', `${appUrl}/${urlFormAdmin}/${adminId}`)
        });
    })

    setFormAction('#form-add-admin', `${appUrl}/${urlFormAdmin}`)
    
}

if (pageUrl === '/admin/order') {
    const manageOrderPage = document.querySelector('#manageOrderPage')
    const orderItem = manageOrderPage.querySelectorAll('.order-item')

    orderItem.forEach((currentItem, index) => {
        const indexToWord = capitalizeFirstLetter(numWords(Number(index) + 1))
        
        setAttributes(document.querySelectorAll('.order-item__btn')[index], {
            'href': `#collapse${indexToWord}`,
            'aria-controls': `#collapse${indexToWord}`
        })
        
        setAttributes(document.querySelectorAll('.order-item__detail')[index], {
            'id': `collapse${indexToWord}`,
            'aria-labelledby': `heading${indexToWord}`
        })

        // for (const attr in attrWillChange) {
        //     currentItem.querySelector('.order-item__detail').setAttribute(attr, `#collapse${indexToWord}`)
        // }
        
    });
}

// general js
$("#zero_config").DataTable()
Array.from(document.querySelectorAll('box-icon')).map(icon => {
    icon.classList.remove('has-arrow') // remove ::after style because of adminmart template
    icon.classList.add('mr-2')
})