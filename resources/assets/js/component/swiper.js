import Swiper from 'swiper/bundle'
import 'swiper/swiper-bundle.css'
import { pageUrl } from '../helper-module'

if (pageUrl === '/game') {
    const elGameSwiper = '.section-game__list'
    const listGame = new Swiper(elGameSwiper, {
        setWrapperSize: true,
        slidesPerView: 2,
        spaceBetween: 30,
        centeredSlides: true,
        initialSlide: 2,
        loop: true,
        grabCursor: true,
        slideActiveClass: 'section-game__item--active',
        slideNextClass: 'section-game__item--next',
        slidePrevClass: 'section-game__item--prev',
        navigation: {
            nextEl: '.section-game__btn-slide--next',
            prevEl: '.section-game__btn-slide--prev',
        },
    })

    const listGameSwiper = document.querySelector(elGameSwiper).swiper
    document.querySelectorAll('.section-game__list .swiper-slide').forEach(eachSlide => {

        eachSlide.addEventListener('click', () => {
            if (eachSlide.classList.contains('section-game__item--next')) {
                listGameSwiper.slideNext()
            }
            else if(eachSlide.classList.contains('section-game__item--prev')) {
                listGameSwiper.slidePrev()
            }
        })
    })
}