import * as HelperModule from "./../../helper-module"

if (HelperModule.pageUrl === '/admin/products') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]')

    $('.btn-delete-product').click(function () {
        var productId = $(this).data('productId');
        $('#modalConfirmDelete').data('productId', productId);
        $('#modalConfirmDelete').modal('show');
    });

    $('#confirmDeleteBtn').click(function () {
        var productId = $('#modalConfirmDelete').data('productId');
        console.log('ok')
        $('#formDelete' + productId).submit();
    });

    btnOpenEditModal.forEach((btn, index) => {
        const productItem = btn.parentNode.parentNode
        let categoryVal, subCategoryVal, parentCategoryValOnChange

        btn.addEventListener('click', () => {
            const categorySelect = document.querySelector('#category-id')
            const subCategorySelect = document.querySelector('#sub-category-id')
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
            document.querySelector('input[name="point_price"]').value = point

            document.querySelector('textarea[name="description"]').value = btn.dataset.productDesc

            document.querySelector('select[name="category_id"]').value = btn.dataset.categoryId;
            document.querySelector('select[name="sub_category_id"]').value = btn.dataset.subCategoryId;
            
            subCatOption.forEach(subCat => {
                subCat.hidden = false
                if (subCat.dataset.parentCategoryId !== document.querySelector('select[name="category_id"]').value) {
                    subCat.hidden = true
                }
            })

            categorySelect.addEventListener('input', function () {
                subCategorySelect.value = ""
                subCatOption.forEach(subCat => {
                    subCat.hidden = false
                    if (subCat.dataset.parentCategoryId !== document.querySelector('select[name="category_id"]').value) {
                        subCat.hidden = true
                    }
                })
            })

        })
    })

}