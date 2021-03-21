const btnsMenu = document.querySelectorAll('.btn-menu')
const showMenuClass = ['opacity-100', 'visible']

document.addEventListener('click', (e) => {
    for (let i = 0; i < btnsMenu.length; i++) {
        const btn = btnsMenu[i]
        let isClickOutside = !btn.contains(e.target)

        if (isClickOutside) {
            btn.nextElementSibling.classList.remove(...showMenuClass)
        }
        else {
            btn.nextElementSibling.classList.add(...showMenuClass)
        }
    }
})