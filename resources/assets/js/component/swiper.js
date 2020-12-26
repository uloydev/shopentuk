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
        on: {
            init: function () {
                // const prevAndNextSlide = this.el.querySelectorAll(
                //     '.section-game__item--next, .section-game__item--prev'
                // )
                // prevAndNextSlide.forEach(notActive => {
                //     notActive.classList.add('items-end')
                //     notActive.querySelectorAll('p').forEach(child => child.classList.add('invisible'))
                // })
            },
        }
    })

    listGame.on('slideChange', function () {
        // const activeSlide = listGame.el.querySelector('.section-game__item[data-swiper-slide-index="' + listGame.realIndex + '"]')
        // activeSlide.classList.remove('items-end')
        // activeSlide.querySelectorAll('p').forEach(paragraph => {
        //     paragraph.classList.remove('invisible')
        // })

        // const prevSlide = listGame.el.querySelector('.section-game__item--prev').previousElementSibling
        // const nextSlide = listGame.el.querySelector('.section-game__item--prev').nextElementSibling
        // const slideNotActive = [prevSlide, nextSlide]

        // prevSlide.classList.add('items-end')
        // prevSlide.querySelectorAll('p').forEach(paragraph => paragraph.classList.add('invisible'))

        // nextSlide.classList.add('items-end')
        // prevSlide.querySelectorAll('p').forEach(paragraph => paragraph.classList.add('invisible'))
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