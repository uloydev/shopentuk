import * as HelperModule from "../../helper-module"

if (HelperModule.pageUrl === '/admin/rules') {
    const btnOpenEditModal = document.querySelectorAll('.btn[data-target="#modal-edit-rule"]')

    btnOpenEditModal.forEach((btn) => {
        const rule = btn.parentNode.parentNode

        btn.addEventListener('click', () => {

            document.querySelector('#modal-edit-rule .modal-title').innerHTML =
            `edit rule <b>${rule.querySelector('.rule-item__number').dataset.original}</b>`
            
            document.querySelector('#modal-edit-rule form').action = btn.dataset.updateUrl

            document.querySelector('textarea[name="content"]').value = btn.dataset.ruleContent

        })
    })

}