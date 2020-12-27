import * as HelperModule from './../helper-module'
import './../component/swiper'

if (HelperModule.pageUrl === '/game') {

    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const userId = document.querySelector('input[name="user_id"]').value
    let game
    fetch('/game/current', {
        method: 'GET',
        headers: {
            'Content-type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-Token': csrf,
        },
    })
    .then(response => response.json())
    .then(function (response) {
        game = response
    })
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
     * submit bid
     */
    const btnSubmitPoint = document.querySelectorAll('.section-game__btn-submit')
    btnSubmitPoint.forEach(btn => {
        const iconBtn = btn.querySelector('box-icon')
        HelperModule.boxiconHoverChangeColor(iconBtn, '#ededed')

        const pointInput = btn.parentElement.querySelector('input[name="point"]');
        const gameItem = pointInput.parentElement.parentElement.parentElement

        /**
         * defined "thank you" message overlay after submit point
         */
        const openThankYouMessage = () => {
            gameItem.querySelector('input[name="choose_option"]').checked = false
            pointInput.disabled = true
            btn.disabled = true
            gameItem.querySelector('.point-submitted').textContent = pointInput.value

            gameItem.querySelector('.section-game__thank-you')
            .classList.add('section-game__thank-you--show')
        }

        btn.addEventListener('click', e => {
            e.preventDefault()
            fetch('/game/bid', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-Token': csrf,
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        game_id: game.id,
                        game_option_id: pointInput.dataset.gameOptionId,
                        point: Number(pointInput.value)
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message)
                    if (data.status == 'success') {
                        openThankYouMessage()
                    }
                })
        })
    })

}
