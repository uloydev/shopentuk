import * as HelperModule from './../helper-module'
import './../component/swiper'

if (HelperModule.pageUrl === '/game') {
    const btnUncheckGame = document.querySelectorAll('.section-game__uncheck')
    btnUncheckGame.forEach(btn => {
        btn.addEventListener('click', () => {
            const chooseOption = btn.parentNode.parentNode.querySelector('input[name="choose_option"]')
            chooseOption.checked = false
        })
    })
}