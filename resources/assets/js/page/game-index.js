import * as HelperModule from './../helper-module'
import './../component/swiper'
import MicroModal from 'micromodal'


if (HelperModule.pageUrl === '/game') {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const userId = document.querySelector('input[name="user_id"]').value
    const checkboxLabels = document.querySelectorAll('.game-checkbox-label');
    const gamePeriod = document.getElementById('gamePeriod');
    const gameStatus = document.getElementById('gameStatus');
    let isPlaying = false;
    let isBidDisabled = false;
    let game, gameEndTime, currentTime;


    /**
     * coutdown game function 
     */
    const startTimer = function (duration, display) {
        var timer = duration;
        var minutes, seconds;
        console.log(timer)
        if (timer > 0) {
            // start interval countdown
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

                // lock bid if time left is 30s
                if (isPlaying && timer <= 30) {
                    isBidDisabled = true;
                    gameStatus.textContent = 'Lock Bid'
                }
            }, 1000);
        } else {
            getGame()
        }
    }

    // update game table
    function updateGameTable(games) {
        console.log(games)
        var html = '';
        games.forEach(game => {
            html += '<tr>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ game.game_period +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ game.bid_count +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">';
            game.winners.forEach(item => {
                if (item.game_option.type == 'color') {
                    html += item.game_option.color;
                } else {                
                    html += item.game_option.number;
                }
                if (game.winners[game.winners.length - 1] != item) {
                    html += ', ';
                }
                
            });
            html += '</td></tr>';
        });
        document.querySelector('#gameTable tbody').innerHTML = html
    }

    // update bid table
    function updateBidTable(bids) {
        console.log(bids)
        var html = '';
        bids.forEach(bid => {
            html += '<tr>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ bid.game.game_period +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ bid.game_option.type +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ (bid.game_option.number == null ? '-' : bid.game_option.number) +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ (bid.game_option.color == null ? '-' : bid.game_option.color) +'</td>';
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ bid.point +'</td>';
            if (bid.status == 'win') {
                html += '<td class="px-4 py-3 whitespace-nowrap text-green-500">'+ bid.status +'</td>';
            } else if (bid.status == 'lose') {
                html += '<td class="px-4 py-3 whitespace-nowrap text-red-500">'+ bid.status +'</td>';
            } else {
                html += '<td class="px-4 py-3 whitespace-nowrap text-blue-500">'+ bid.status +'</td>';

            }
            html += '<td class="px-4 py-3 whitespace-nowrap">'+ bid.reward +'</td>';
            html += '</tr>';
        });
        document.querySelector('#bidTable tbody').innerHTML = html
    }

    // fetch game data from api
    function getGame() {
        fetch('/game/current', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-Token': csrf,
            },
            body: JSON.stringify({
                userId: userId,
            })
        })
        .then(response => response.json())
        .then(function (response) {
            const point = document.querySelector('.sidebar-game__total-point')
            game = response.game
            // parse time
            gameEndTime = Math.ceil(Date.parse(game.ended_at) / 1000);
            currentTime = Math.ceil(Date.parse(response.currentTime) / 1000);
            console.log(gameEndTime, currentTime, gameEndTime-currentTime, response.currentTime)
            // update user point on sidebar
            point.textContent = response.userPoint;
            console.log('response.lastGames')
            updateGameTable(response.lastGames)
            updateBidTable(response.lastBids);
            // update game period
            gamePeriod.textContent = game.game_period;
            // submit btn onclick
            document.querySelectorAll('.section-game__btn-submit').forEach(btn => {
                const pointInput = btn.parentElement.querySelector('input[name="point"]');
                const gameItem = pointInput.parentElement.parentElement.parentElement.parentElement.parentElement;
                gameItem.querySelector('input[name="choose_option"]').checked = false
                pointInput.disabled = false
                btn.disabled = false
                pointInput.value = null
                gameItem.querySelector('.point-submitted').textContent = ''
                gameItem.querySelector('.thanks-box').classList.remove('thanks-box--show');
            })
            // close option btn onclick
            document.querySelectorAll('.section-game__uncheck').forEach(btn => {
                if (!btn.classList.contains('hidden')) {
                    btn.classList.add('hidden');
                }
            });
            gameStatus.textContent = "Playing"
            isPlaying = true;
            isBidDisabled = false;
            startTimer(gameEndTime - currentTime, document.querySelector('.section-game__timer'))
            // set bid that picked before
            response.userBids.forEach(bid => {
                const pointInput = document.querySelector('input#input-point'+bid.game_option_id)
                const gameItem = pointInput.parentElement.parentElement.parentElement.parentElement.parentElement;
                pointInput.value = bid.point
                gameItem.querySelector('input[name="choose_option"]').checked = false
                pointInput.disabled = true
                gameItem.querySelector('.point-submitted').textContent = pointInput.value
                gameItem.querySelector('.thanks-box')
                .classList.add('thanks-box--show')
            })
            console.log(game)
        })
    }

    
    // fetch game data
    getGame();

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
            btn.classList.add('hidden')
            btn.parentNode.querySelector('input[name="choose_option"]').checked = false
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
        const gameItem = pointInput.parentElement.parentElement.parentElement.parentElement.parentElement

        /**
         * defined "thank you" message overlay after submit point
         */
        const openThankYouMessage = () => {
            gameItem.querySelector('input[name="choose_option"]').checked = false
            pointInput.disabled = true
            gameItem.querySelector('.point-submitted').textContent = pointInput.value

            gameItem.querySelector('.thanks-box')
            .classList.add('thanks-box--show')
        }

        btn.addEventListener('click', e => {
            e.preventDefault()
            if (!isBidDisabled) {
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
                    updateGameTable(data.lastGames)
                    updateBidTable(data.lastBids)
                    if (data.status == 'success') {
                        openThankYouMessage()
                        const point = document.querySelector('.sidebar-game__total-point')
                        const pointInit = Number(point.textContent.trim())
                        const pointAfterSubmit = pointInit - Number(pointInput.value)
                        console.log(`pointAfterSubmit: ${pointAfterSubmit}`)
                        point.textContent = pointAfterSubmit 
                    }
                })
            } else {
                gameItem.querySelector('input[name="choose_option"]').checked = false
            }
        })
    })

    // option label onclick 
    checkboxLabels.forEach(label => {
        var inputCheckbox = label.querySelector('input[name="choose_option"]');
        var thanksBox = label.parentElement.querySelector('.thanks-box');
        var uncheckBtn = label.parentElement.querySelector('.section-game__uncheck');
        label.addEventListener('click', (e) => {
            e.preventDefault();
            // can't bid if isBidDisabled
            if (isBidDisabled && !thanksBox.classList.contains('thanks-box--show')) {
                    alert('Tidak bisa input bid, waktu kurang dari 30 detik');
                    inputCheckbox.checked = false;
                    if (!uncheckBtn.classList.contains('hidden')) {
                        uncheckBtn.classList.add('hidden');
                    }
            } else {
                if (inputCheckbox.checked == false) {
                    label.parentElement.querySelector('.section-game__uncheck').classList.remove('hidden');
                    inputCheckbox.checked = true;
                }
            }
        })
    });
}
