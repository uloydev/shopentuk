import * as HelperModule from './../helper-module'
import './../component/swiper'
import MicroModal from 'micromodal'


if (HelperModule.pageUrl === '/game') {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;
    const userId = document.querySelector('input[name="user_id"]').value
    // const playingContent = document.getElementById('playingContent');
    // const finishedContent = document.getElementById('finishedContent');
    const checkboxLabels = document.querySelectorAll('.game-checkbox-label');
    const gamePeriod = document.getElementById('gamePeriod');
    const gameStatus = document.getElementById('gameStatus');
    let isPlaying = false;
    let isWaiting = false;
    let isBidDisabled = false;
    // const btnDeleteBid = document.querySelectorAll('button.btn-delete-bid');
    let game, gameEndTime, currentTime, playingTime;
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

                if (isWaiting) {
                    isBidDisabled = true;
                }

                if (isPlaying && timer <= 30) {
                    isBidDisabled = true;
                    gameStatus.textContent = 'Lock Bid'
                }
            }, 1000);
        } else {
            getGame()
        }
    }

    // function showPlayingContent() {
    //     finishedContent.hidden = true;
    //     playingContent.hidden = false;
    // }

    // function showFinishedContent(winnerOptions) {
    //     console.log(winnerOptions)
    //     playingContent.hidden = true;
    //     var html = '';
    //     winnerOptions.forEach(option => {
    //         if (option.game_option.type == 'color') {
    //             html += '<li>' + option.game_option.color + ' => points X' + option.value + '</li>';
    //         } else {
    //             html += '<li>No ' + option.game_option.number + ' => points X' + option.value + '</li>';
    //         }
    //     });
    //     document.getElementById('winnerOptions').innerHTML = html;
    //     finishedContent.hidden = false;
    // }

    // function updateNextGameList(nextGames) {
    //     var html = '';
    //     nextGames.forEach( game => {
    //         html += '<li class="sidebar-game__dropdown-item"><span class="flex items-center lg:w-auto px-4 w-1/3 py-4 capitalize cursor-pointer w-full"><span class="mr-2">Jam:</span><time>' + game.formatted_start_time + '</time></span></li>';
    //     });
    //     document.getElementById('nextGameList').innerHTML = html;
    // }

    function updateBidResult(bids) {
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
        document.querySelector('#gameTable tbody').innerHTML = html
    }


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
            gameEndTime = Math.ceil(Date.parse(game.ended_at) / 1000);
            currentTime = Math.ceil(Date.parse(response.currentTime) / 1000);
            console.log(gameEndTime, currentTime, gameEndTime-currentTime, response.currentTime)
            playingTime = gameEndTime - currentTime - 60;
            point.textContent = response.userPoint;
            updateBidResult(response.lastTenBids);
            gamePeriod.textContent = game.game_period;
            if (playingTime <= 0) {
                isPlaying = false;
                if (game.winner_option_id == null) {
                    getGame()
                } else {
                    gameStatus.textContent = "Waiting"
                    isWaiting = true;
                    // showFinishedContent(response.winnerOptions);
                    document.querySelectorAll('.section-game__btn-submit').forEach(btn => {
                        const pointInput = btn.parentElement.querySelector('input[name="point"]');
                        const gameItem = pointInput.parentElement.parentElement.parentElement.parentElement.parentElement;
                        gameItem.querySelector('input[name="choose_option"]').checked = false
                        pointInput.disabled = false
                        btn.disabled = false
                        pointInput.value = null
                        gameItem.querySelector('.point-submitted').textContent = ''
                        gameItem.querySelector('.thanks-box').classList.remove('thanks-box--show')
                    })
                    startTimer(gameEndTime-currentTime, document.querySelector('.section-game__timer'))
                }
            } else {
                gameStatus.textContent = "Playing"
                isPlaying = true;
                isWaiting = false;
                isBidDisabled = false;
                // showPlayingContent();
                startTimer(playingTime, document.querySelector('.section-game__timer'))
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
            }
            // updateNextGameList(response.nextGame);
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

        const closeThankYouMessage = () => {
            gameItem.querySelector('input[name="choose_option"]').checked = true
            pointInput.disabled = false
            gameItem.querySelector('.point-submitted').textContent = ''

            gameItem
            .querySelector('.thanks-box')
            .classList
            .remove('thanks-box--show')
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
                    updateBidResult(data.lastTenBids)
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
                // alert('Tidak bisa input bid jika waktu kurang dari 30 detik');
            }
        })
    })

    // disable bid if time left 30s
    checkboxLabels.forEach(label => {
        var inputCheckbox = label.querySelector('input[name="choose_option"]');
        var thanksBox = label.parentElement.querySelector('.thanks-box');
        var uncheckBtn = label.parentElement.querySelector('.section-game__uncheck');
        label.addEventListener('click', (e) => {
            e.preventDefault();
            if (isBidDisabled && !thanksBox.classList.contains('thanks-box--show')) {
                if (isWaiting) {
                    alert('Tidak bisa input bid, game belum dimulai');
                } else {
                    alert('Tidak bisa input bid, waktu kurang dari 30 detik');
                    inputCheckbox.checked = false;
                    if (!uncheckBtn.classList.contains('hidden')) {
                        uncheckBtn.classList.add('hidden');
                    }
                }
            } else {
                if (inputCheckbox.checked == false) {
                    label.parentElement.querySelector('.section-game__uncheck').classList.remove('hidden');
                    inputCheckbox.checked = true;
                }
            }
        })
    });

    // delete bid
    // btnDeleteBid.forEach(btn => {
    //     btn.addEventListener('click', e => {
    //         const gameItem = btn.parentElement.parentElement;
    //         const pointInput = gameItem.querySelector('input[name="point"]')
    //         fetch('/game/bid/cancel', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-type': 'application/json',
    //                 'Accept': 'application/json',
    //                 'X-CSRF-Token': csrf,
    //             },
    //             body: JSON.stringify({
    //                 user_id: userId,
    //                 game_id: game.id,
    //                 game_option_id: pointInput.dataset.gameOptionId
    //             }),
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data)
    //             alert(data.message)
    //             if (data.status == 'success') {
    //                 const point = document.querySelector('.sidebar-game__total-point')
    //                 const pointInit = Number(point.textContent.trim())
    //                 document.querySelector('.sidebar-game__total-point').textContent = pointInit + Number(pointInput.value) 
    //                 gameItem.querySelector('input[name="choose_option"]').checked = false
    //                 pointInput.disabled = false
    //                 pointInput.value = null
    //                 gameItem.querySelector('.point-submitted').textContent = ''
    //                 gameItem.querySelector('.thanks-box').classList.remove('thanks-box--show')
    //             }
    //         })
    //     });
    // });
}
