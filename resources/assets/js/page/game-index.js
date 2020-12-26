import * as HelperModule from './../helper-module'
import './../component/swiper'

if (HelperModule.pageUrl === '/game') {
    function getCurrentGame() {
        fetch('/game/current', {
            method: 'GET',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-Token': csrf,
            },
        })
        .then(response => {
            return response.json()
        })
    }
    
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const userId = document.querySelector('input[name="user_id"]').value
    let game = getCurrentGame();
    

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
     * dropdown menu for sideebar
     */
    const btnShowNextSchedule = document.querySelector('.sidebar-game__link--dropdown')
    const iconBtnNextSchedule = btnShowNextSchedule.querySelector('box-icon')
    const dropdownBox = btnShowNextSchedule.nextElementSibling

    btnShowNextSchedule.addEventListener('click', (e) => {
        e.preventDefault()
        if (dropdownBox.classList.contains('sidebar-game__dropdown-box--active')) {
            iconBtnNextSchedule.classList.remove('transform', 'rotate-90')
            dropdownBox.classList.remove('sidebar-game__dropdown-box--active')
        }
        else {
            iconBtnNextSchedule.classList.add('transform', 'rotate-90')
            dropdownBox.classList.add('sidebar-game__dropdown-box--active')
        }
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
        btn.addEventListener('click', e => {
            e.preventDefault()
            const pointInput = btn.parentElement.querySelector('input[name="point"]');
            fetch('/game/bid', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-Token': csrf,
                },
                body: JSON.stringify({
                    user_id : userId,
                    game_id : game.id,
                    game_option_id: pointInput.dataset.gameOptionId,
                    point : pointInput.value
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'success') {
                    alert(data.message)
                } else {
                    alert(data.message)
                }
            })
        })
    })
    
}