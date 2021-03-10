import * as HelperModule from './../helper-module'
import './../component/swiper'
import MicroModal from 'micromodal'

if (HelperModule.pageUrl === '/game') {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const userId = document.querySelector('input[name="user_id"]').value
    let game, gameEndTime, currentTime
    // let currentTime = Date.parse(document.getElementById('currentTime').value);
    // console.log(currentTime.toString());
    /**
     * coutdown game
     */
    const startTimer = function (duration, display) {
        var timer = duration;
        var minutes, seconds;
        console.log(timer)
        if (timer > 0) {
            let gameInterval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
        
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
        
                display.textContent = minutes + ":" + seconds;
        
                if (--timer < 0) {
                    getGame();
                    clearInterval(gameInterval);
                }
            }, 1000);
        } else {
            getGame()
        }
    }

    function getGame() {
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
            game = response.game
            gameEndTime = Math.ceil(Date.parse(game.ended_at) / 1000);
            currentTime = Math.ceil(Date.parse(response.currentTime) / 1000);
            console.log(gameEndTime, currentTime, gameEndTime-currentTime, response.currentTime)
            startTimer(gameEndTime-currentTime, document.querySelector('.section-game__timer'))
            console.log(game)
        })
    }

    getGame();

    // fetch game data

    

    /**
     * container page
     */
    const heightNav = document.querySelector('.nav').getBoundingClientRect().height
    const heightContent = `calc(100% - ${heightNav}px)`
    document.querySelector('main').style.height = heightContent

    /**
     * open rules modal
     */
    MicroModal.init()

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
     * submit bid
     */
    const btnSubmitPoint = document.querySelectorAll('.section-game__btn-submit')
    btnSubmitPoint.forEach(btn => {
        const iconBtn = btn.querySelector('box-icon')
        HelperModule.boxiconHoverChangeColor(iconBtn, '#ededed')

        const pointInput = btn.parentElement.querySelector('input[name="point"]');
        const gameItem = pointInput.parentElement.parentElement.parentElement.parentElement

        /**
         * defined "thank you" message overlay after submit point
         */
        const openThankYouMessage = () => {
            gameItem.querySelector('input[name="choose_option"]').checked = false
            pointInput.disabled = true
            btn.disabled = true
            gameItem.querySelector('.point-submitted').textContent = pointInput.value

            gameItem.querySelector('.thanks-box')
            .classList.add('thanks-box--show')
        }

        const closeThankYouMessage = () => {
            gameItem.querySelector('input[name="choose_option"]').checked = true
            pointInput.disabled = false
            btn.disabled = false
            gameItem.querySelector('.point-submitted').textContent = ''

            gameItem
            .querySelector('.thanks-box')
            .classList
            .remove('thanks-box--show')
        }

        btn.addEventListener('click', e => {
            e.preventDefault()
            if (Number(pointInput.value) > 0) {
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
                        const point = document.querySelector('.sidebar-game__total-point')
                        const pointInit = Number(point.textContent.trim().replace('PTS', ''))

                        const pointAfterSubmit = pointInit - Number(pointInput.value)
                        console.log(`pointAfterSubmit: ${pointAfterSubmit}`)
                        point.textContent = pointAfterSubmit + 'PTS'
                    }
                })
            } else {
                fetch('/game/bid/cancel', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-Token': csrf,
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        game_id: game.id,
                        game_option_id: pointInput.dataset.gameOptionId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message)
                    if (data.status == 'success') {
                        closeThankYouMessage()
                    }
                })
            }
        })
    })

}
