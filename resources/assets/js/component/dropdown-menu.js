/**
 * dropdown menu for sideebar
 */
const dropdownToggler = document.querySelector('.dropdown-toggler')

if (dropdownToggler) {
    const iconToggler = dropdownToggler.querySelector('box-icon')
    const dropdownBox = dropdownToggler.nextElementSibling // .dropdown-box
    dropdownToggler.addEventListener('click', (e) => {
        e.preventDefault()
        if (dropdownBox.classList.contains('dropdown-box--active')) {
            iconToggler.classList.remove('transform', 'rotate-90')
            dropdownBox.classList.remove('dropdown-box--active')
        } else {
            iconToggler.classList.add('transform', 'rotate-90')
            dropdownBox.classList.add('dropdown-box--active')
        }
    })
}
