import * as HelperModule from "../../helper-module";

if (pageUrl === '/admin/all-category' || pageUrl === '/admin/all-category/') {
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