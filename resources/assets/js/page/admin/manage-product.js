import * as HelperModule from "./../../helper-module"

if (HelperModule.pageUrl === '/admin/products') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]')

    btnOpenEditModal.forEach((btn, index) => {
        const productItem = btn.parentNode.parentNode
        const subCatSelect = document.querySelector('select[name="sub_category_id"]')

        // const fieldInputs = ['title', 'price', 'point']
        const fieldSelects = ['category', 'sub-category-id']
        
        let categoryVal, subCategoryVal, parentCategoryVal

        btn.addEventListener('click', () => {
            const categorySelect = document.querySelector('#category-id')
            const subCatOption = document.querySelectorAll('#sub-category-id option')

            document.querySelector('#modal-edit-product .modal-title').innerHTML =
            `edit product <b>${productItem.querySelector('.product-item__title').dataset.original}</b>`
            
            document.querySelector('#modal-edit-product form').action = btn.dataset.updateUrl

            //title
            document.querySelector('input[name="title"]').value =
            productItem.querySelector('.product-item__title').dataset.original

            //price
            document.querySelector('input[name="price"]').value =
            productItem.querySelector('.product-item__price').dataset.original

            //point
            const point = productItem.querySelector('.product-item__point').dataset.original
            console.log(`point: ${point}`)
            document.querySelector('input[name="point_price"]').value = point

            document.querySelector('textarea[name="description"]').value = btn.dataset.productDesc

            categoryVal = document.querySelectorAll('.product-item__category')[index].dataset.original
            document.querySelector('select[name="category_id"]').value = categoryVal
            
            subCategoryVal = document.querySelectorAll('.product-item__sub-category')[index].dataset.original
            document.querySelector('select[name="sub_category_id"]').value = subCategoryVal
            console.log(`subCategoryVal: ${subCategoryVal}`)

            
            let subCategoryOption
            subCatOption.forEach(subCat => {
                subCategoryOption = subCat.dataset.parentCategory
                if (subCategoryOption !== categoryVal) {
                    subCat.hidden = true
                }
            })

            categorySelect.addEventListener('change', function () {
                parentCategoryVal = categorySelect.options[categorySelect.selectedIndex].value

                subCatOption.forEach(subCat => {
                    subCat.hidden = false
                    if (subCat.dataset.parentCategory != parentCategoryVal) {
                        subCat.hidden = true
                    }
                    else {
                        subCat.selected = true
                        subCat.hidden = false
                    }
                })
                
            })

        })
    })

}