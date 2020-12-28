import 'boxicons'
import { capitalizeFirstLetter, setAttributes } from './../helper-module'

const numWords = require('num-words')
const appUrl = window.location.origin
const pageUrl = window.location.pathname

const logoutBtn = document.querySelector('#logoutBtn')
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault()
    document.getElementById('logout-form').submit()
});

// /admin/all-category page
if (pageUrl === '/admin/all-category' || pageUrl === '/admin/all-category/') {
    console.log('ok')
    const modalManipulatePrimaryCategory = document.querySelector('#modal-manipulate-primary-category')
    const editPrimaryBtn = document.querySelectorAll('.edit-primary-category')
    const addPrimaryCategory = document.querySelector('.add-primary-category')
    const btnManipulateCategory = [addPrimaryCategory, ...editPrimaryBtn]
    let titleModal, primaryTitle, primaryDesc, primaryIsDigitalProduct, urlForm

    btnManipulateCategory.forEach(btn => {
        btn.addEventListener('click', () => {
            urlForm = btn.dataset.routing
            if (btn.classList.contains('edit-primary-category')) {
                titleModal = 'edit'
                primaryTitle = btn.parentNode.querySelector('.primary-category__title').textContent.trim()
                primaryDesc = btn.dataset.desc
                primaryIsDigitalProduct = Boolean(Number(btn.dataset.isDigital))

                console.log(primaryIsDigitalProduct)
                
                modalManipulatePrimaryCategory.querySelector('input[name="title"]').value = primaryTitle
                modalManipulatePrimaryCategory
                .querySelector('input[name="is_digital_product"]')
                .checked = primaryIsDigitalProduct == false ? false : true

                modalManipulatePrimaryCategory.querySelector('input[name="_method"]').disabled = false
            }
            else {
                titleModal = 'add new'
                modalManipulatePrimaryCategory.querySelector('input[name="_method"]').disabled = true
            }
            titleModal = `${titleModal} category`

            $("#modal-manipulate-primary-category").modal('show')
            modalManipulatePrimaryCategory.querySelector('.modal-title').textContent = titleModal
            modalManipulatePrimaryCategory.querySelector('form').action = urlForm
            
            $('#modal-manipulate-primary-category').on('hidden.bs.modal', function (e) {
                $(this).find("input:not([name='_method']), textarea").val("").prop('checked', false)
            })

        })
    })
}
if (pageUrl.includes('/sub')) {
    // edit sub category
    const modalEditSub = document.querySelectorAll('.edit-sub-category-btn')
    const modalManipulateCategory = document.querySelector('.modal-manipulate-category')
    let modalTitle = modalManipulateCategory.querySelector('.modal-title')
    let modalTitleText, subCategoryVal, parentCategoryVal
    const modalForm = modalManipulateCategory.querySelector('#form-edit-sub-category')

    const parentCategoryOptionEl = modalManipulateCategory
                                .querySelectorAll('#parent-category option:enabled')
    
    modalEditSub.forEach(btnEditSub => {
        const modalEditId = btnEditSub.dataset.target
        const subCategoryEl = btnEditSub.parentNode.querySelector('.subcategory__title')

        btnEditSub.addEventListener('click', function() {
            modalForm.action = this.dataset.editLink
            modalTitleText = 'edit sub category'
            modalManipulateCategory.setAttribute(
                'aria-labelledby', modalEditId.replace('#', '') + 'Label'
            );
            $(".modal-manipulate-category").modal('show')
            modalTitle.setAttribute('id', 'modalEditCategoryLabel')
            modalTitle.textContent = modalTitleText

            subCategoryVal = subCategoryEl.textContent.trim()
            parentCategoryVal = subCategoryEl.dataset.categoryParent.trim()
            modalManipulateCategory.querySelector('#sub-category').value = subCategoryVal
            
            parentCategoryOptionEl.forEach(parentCategory => {
                if (parentCategory.textContent.trim() === parentCategoryVal) {
                    parentCategory.selected = true
                }
            })
        })
    })

    $('.modal-manipulate-category').on('hidden.bs.modal', function (e) {
        parentCategoryOptionEl[0].selected = true
        modalManipulateCategory.querySelector('#sub-category').value = null
    })
    // end of edit sub category

    // add new sub category
    const addSubCategory = document.querySelector('#btn-add-sub-category')
    addSubCategory.addEventListener('click', function(){
        modalForm.action = modalForm.dataset.addLink
        $(".modal-manipulate-category").modal('show')
        modalTitleText = 'add new sub category for ' + this.dataset.category
        modalManipulateCategory.setAttribute('aria-labelledby', 'addNewCategoryLabel')
        modalTitle.textContent = modalTitleText
    })
    // end of add new sub category
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

$(".refresh-btn").on('click', function (e) {
    e.preventDefault()
    location.reload()
})