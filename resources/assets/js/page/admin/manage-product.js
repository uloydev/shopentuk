import * as HelperModule from "./../../helper-module"

if (HelperModule.pageUrl === '/admin/products') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]')

    btnOpenEditModal.forEach(btn => {
        const productItem = btn.parentNode.parentNode

        const fieldInputs = ['title', 'price', 'point']
        const fieldSelects = ['category', 'sub-category']

        let parentCategoryVal

        btn.addEventListener('click', () => {
            const categorySelect = document.querySelector('#category-id')
            const subCatSelect = document.querySelectorAll('#sub-category-id option')

            document.querySelector('#modal-edit-product .modal-title').innerHTML =
            `edit product <b>${productItem.querySelector('.product-item__title').dataset.original}</b>`
            
            document.querySelector('#modal-edit-product form').action = btn.dataset.updateUrl

            for (let i = 0; i < fieldInputs.length; i++) {
                document.querySelector(`input[name="${fieldInputs[i]}"]`).value =
                productItem.querySelector(`.product-item__${fieldInputs[i]}`).dataset.original
            }

            for (let i = 0; i < fieldSelects.length; i++) {
                document.querySelector(`select[name="${fieldSelects[i]}"]`).value =
                productItem.querySelector(`.product-item__${fieldSelects[i]}`).dataset.original
            }

            categorySelect.addEventListener('change', function () {
                parentCategoryVal = categorySelect.options[categorySelect.selectedIndex].text

                subCatSelect.forEach(optionSubCat => {
                    optionSubCat.selected = false
                    if (optionSubCat.dataset.parentCategory !== parentCategoryVal) {
                        optionSubCat.hidden = true
                    }
                    else {
                        optionSubCat.hidden = false
                    }
                })
                
            })

        })
    })

}