const logoutBtn = document.querySelector('#logoutBtn')
logoutBtn.addEventListener('click', (e) => {
    e.preventDefault()
    document.getElementById('logout-form').submit()
})

$("#zero_config").DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'pdf',
            text: 'Download as PDF'
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