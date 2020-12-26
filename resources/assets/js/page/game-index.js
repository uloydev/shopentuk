import * as HelperModule from './../helper-module'
import './../component/swiper'

if (HelperModule.pageUrl === '/game') {

    /**
     * pick number
     */
    const btnUncheckGame = document.querySelectorAll('.section-game__uncheck')
    btnUncheckGame.forEach(btn => {
        btn.addEventListener('click', () => {
            const chooseOption = btn.parentNode.parentNode.querySelector('input[name="choose_option"]')
            chooseOption.checked = false
        })
    })

    /**
     * submit point
     */
    document.querySelectorAll('.section-game__form').forEach(formSubmitGame => {
        const gameItem = formSubmitGame.parentElement.parentElement
        const gameInputPoint = formSubmitGame.querySelector('.section-game__input')

        formSubmitGame.addEventListener('submit', (e) => {
            e.preventDefault()

            if (gameInputPoint.value.trim() != null) {
                // close the form input point
                gameItem.querySelector('input[name="choose_option"]').checked = false
                
                // open the modal says "you're inputing {point_value}, 
                // good luck with your gambling!"
                gameItem.querySelector('.point-submitted').textContent = gameInputPoint.value.trim()
                gameItem.querySelector('.section-game__thank-you')
                .classList
                .add('section-game__thank-you--show')
            }

        })
    })

    /**
     * icon style for button submit point
     */

    const btnSubmitPoint = document.querySelectorAll('.section-game__btn-submit')
    btnSubmitPoint.forEach(btn => {
        const iconBtn = btn.querySelector('box-icon')
        HelperModule.boxiconHoverChangeColor(iconBtn, '#ededed')
    })
    
}