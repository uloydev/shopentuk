import 'boxicons'
import './admin/category-parent'
import './admin/category-sub'
import './admin/manage-admin'
import './admin/manage-order'
import './admin/manage-product'

const logoutBtn = document.querySelector('#logoutBtn')
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault()
    document.getElementById('logout-form').submit()
})

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