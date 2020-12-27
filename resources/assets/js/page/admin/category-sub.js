import { pageUrl } from "../../helper-module"

if (pageUrl === '/admin/all-category/sub') {
    // edit sub category
    const modalEditSub = document.querySelectorAll('.edit-sub-category-btn')
    const modalManipulateCategory = document.querySelector('.modal-manipulate-category')
    let modalTitle = modalManipulateCategory.querySelector('.modal-title')
    let modalTitleText, subCategoryVal, parentCategoryVal

    const parentCategoryOptionEl = 
    modalManipulateCategory.querySelectorAll('#parent-category option:enabled')
    
    modalEditSub.forEach(btnEditSub => {
        const modalEditId = btnEditSub.dataset.target
        const subCategoryEl = btnEditSub.parentNode.querySelector('.subcategory__title')

        btnEditSub.addEventListener('click', () => {
            modalTitleText = 'edit category'
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
        $(".modal-manipulate-category").modal('show')
        modalTitleText = 'add new category'
        modalManipulateCategory.setAttribute('aria-labelledby', 'addNewCategoryLabel')
        modalTitle.textContent = modalTitleText
    })
    // end of add new sub category
}