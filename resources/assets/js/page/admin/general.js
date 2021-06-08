const logoutBtn = document.querySelector('#logoutBtn')
if (logoutBtn) {
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault()
        document.getElementById('logout-form').submit()
    })
}

$("#zero_config").DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'collection',
            text: 'Download Data',
            buttons: ['pdf', 'excel']
        }
    ]
})

document.querySelectorAll('box-icon').forEach(icon => {
    icon.classList.remove('has-arrow') // remove ::after style because of adminmart template
    icon.classList.add('mr-2')
})

$(".refresh-btn").on('click', function (e) {
    e.preventDefault()
    location.reload()
})