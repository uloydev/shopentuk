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

    const btnSubmitPoint = document.querySelectorAll('.section-game__btn-submit')
    btnSubmitPoint.forEach(btn => {
        const originalIconColor = btn.querySelector('box-icon').getAttribute('color')

        btn.addEventListener('mouseover', () => {
            btn.querySelector('box-icon').setAttribute('color', '#ededed')
        })
        btn.addEventListener('mouseleave', () => {
            console.log('mouse leave')
            btn.querySelector('box-icon').setAttribute('color', originalIconColor)
        })
    })
}