import * as HelperModule from './../helper-module'
import './../component/swiper'
import MicroModal from 'micromodal'

if (HelperModule.pageUrl === '/game') {

    /**
        function test1(waktu = 1000, isDinamis = false) {
            console.log(`test 1`)
        }

        function test2(waktu = 2000, isDinamis = false) {
            console.log(`test 2`)
        }

        function strict() {
            let nyobaGame
            test1()
            setTimeout(() => {
                test2()
            }, 2000)
            nyobaGame = setInterval(() => {
                test1()
                setTimeout(() => {
                test2()
                }, 2000)
            }, 3000)
        }

        function dinamis(defineWaktu) {
            let waktuTest1, waktuTest2
            if (defineWaktu > 1000) {
            waktuTest1 = defineWaktu - 1000
            waktuTest2 = 1000
        }
        else {
            waktuTest1 = 0
            waktuTest2 = defineWaktu
        }
        
        if (waktuTest1 > 0) {
            test1(waktuTest1, true)
            let nyobaGame = setInterval(() => {
                test2(waktuTest2, true)
                clearInterval(nyobaGame)
            }, waktuTest1)
            
        }
        else {
            test2(waktuTest1, true)
        }
        
        }

        dinamis(5000)
        setTimeout(() => {
        strict()
        }, 5000)


         setInterval(() => test1().then(test2), 3000)
     */

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
     * coutdown game
     */
    const startTimer = (duration, display) => {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
    
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
    
            display.textContent = minutes + ":" + seconds;
    
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    startTimer(60 * 3, document.querySelector('.section-game__timer'))
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
