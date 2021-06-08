import * as HelperModule from "../../helper-module";

if (HelperModule.pageUrl.includes('/sub')) {
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

    $("#btn-add-sub-category").click(function () {
        $('.modal-manipulate-category #sub-category').val(null)
    });
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