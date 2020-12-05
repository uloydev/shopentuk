import { pageUrl } from './../helper-module'

if (pageUrl === '/') {
    document.querySelector('header, main').classList.remove('bg-gray-100')

    //jika lg di landing page dan di mode tablet keatas, icon menu ganti warna jd putih
    if (window.screen.width > 768) {
        document.querySelectorAll(
            '.nav .container > .nav__ul > .nav__item > .nav__link > .child-dropdown-icon'
        ).forEach(dropdownIcon => {
            dropdownIcon.setAttribute('color', '#fff')
        });
    }
}