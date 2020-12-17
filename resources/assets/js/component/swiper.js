import Swiper from 'swiper/bundle'
import 'swiper/swiper-bundle.css'

const listGame = new Swiper('.section-game__list', {
    setWrapperSize: true,
    slidesPerView: 2,
    spaceBetween: 30,
    centeredSlides: true,
    initialSlide: 2,
    loop: true,
    slideActiveClass: 'section-game__item--active',
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
})

listGame.on('slideChange', () => {
    console.log('test')  
})