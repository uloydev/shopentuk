import * as HelperModule from "./../../helper-module"

if (HelperModule.pageUrl === '/admin/products') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]')
    const btnOpenAddModal = document.querySelector('.btn[data-target="#modal-add-product"]')
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

    btnOpenAddModal.addEventListener('click', function () {
        const modalAdd = document.getElementById('modal-add-product')
        const categorySelect = modalAdd.querySelector('#category-id')
        const subCategorySelect = modalAdd.querySelector('#sub-category-id')
        const subCatOption = modalAdd.querySelectorAll('#sub-category-id option')
        categorySelect.value = ""
        subCategorySelect.value = ""
        categorySelect.addEventListener('input', function () {
            subCategorySelect.value = ""
            subCatOption.forEach(subCat => {
                subCat.hidden = false
                if (subCat.dataset.parentCategoryId !== categorySelect.value) {
                    subCat.hidden = true
                }
            })
        })
    });

    btnOpenEditModal.forEach(function (btn, index) {
        const productItem = btn.parentNode.parentNode

        btn.addEventListener('click', function () {
            const modalEdit = document.getElementById('modal-edit-product')
            const categorySelect = modalEdit.querySelector('#category-id')
            const subCategorySelect = modalEdit.querySelector('#sub-category-id')
            const subCatOption = modalEdit.querySelectorAll('#sub-category-id option')

            modalEdit.querySelector('.modal-title').innerHTML =
                `edit product <b>${productItem.querySelector('.product-item__title').dataset.original}</b>`

            modalEdit.querySelector('form').action = btn.dataset.updateUrl

            //title
            modalEdit.querySelector('input[name="title"]').value =
                productItem.querySelector('.product-item__title').dataset.original

            //price
            modalEdit.querySelector('input[name="price"]').value =
                productItem.querySelector('.product-item__price').dataset.original

            //point
            const point = productItem.querySelector('.product-item__point').dataset.original
            modalEdit.querySelector('input[name="point_price"]').value = point

            modalEdit.querySelector('textarea[name="description"]').value = btn.dataset.productDesc

            modalEdit.querySelector('select[name="category_id"]').value = btn.dataset.categoryId;
            modalEdit.querySelector('select[name="sub_category_id"]').value = btn.dataset.subCategoryId;

            subCatOption.forEach(subCat => {
                subCat.hidden = false
                if (subCat.dataset.parentCategoryId !== modalEdit.querySelector('select[name="category_id"]').value) {
                    subCat.hidden = true
                }
            })

            categorySelect.addEventListener('input', function () {
                subCategorySelect.value = ""
                subCatOption.forEach(subCat => {
                    subCat.hidden = false
                    if (subCat.dataset.parentCategoryId !== categorySelect.value) {
                        subCat.hidden = true
                    }
                })
            })

        })
    })

}
