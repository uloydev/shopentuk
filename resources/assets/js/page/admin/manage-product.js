import * as HelperModule from "./../../helper-module"

if (HelperModule.pageUrl === '/admin/products') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-product"]')
    const btnOpenAddModal = document.querySelector('.btn[data-target="#modal-add-product"]')
    // console.log(modalConfirmDelete)
    document.querySelectorAll('.btn-delete-product').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            console.log('ok')
            e.preventDefault();
            document.getElementById('modalConfirmDelete').dataset.productId = btn.dataset.productId;
            $('#modalConfirmDelete').modal('show');
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('formDelete' + document.getElementById('modalConfirmDelete').dataset.productId).submit();
    })

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

            modalEdit.querySelector('input[name="is_redeem"][value="'+ btn.dataset.isRedeem +'"]').checked = true;
            modalEdit.querySelector('input[name="weight"]').value = btn.dataset.weight;
            modalEdit.querySelector('input[name="point_bonus"]').value = btn.dataset.pointBonus;
            modalEdit.querySelector('img#productImage').src = btn.dataset.imageUrl;


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
