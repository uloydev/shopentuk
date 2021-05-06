import * as HelperModule from "../../helper-module";

if (HelperModule.pageUrl === '/admin/game/current') {
    let isGameDisabled = false;

    const updateGameDetail = (game) => {
        var winnersHtml = '';
        $('#gameDetail #period').text(game.game_period);
        $('#gameDetail #start').text(game.formatted_start_time);
        $('#gameDetail #finish').text(game.formatted_finish_time);
        $('#gameDetail #status').text(game.status);
        $('#gameDetail #isCustom').text(game.is_custom ? 'YES' : 'NO');
        $('#gameDetail #bidTotal').text(game.bid_count);

        game.winners.forEach((winner) => {
            if (winner.game_option.type == 'number') {
                winnersHtml += winner.game_option.number + ' ';
            } else {
                winnersHtml += '<span class="color-circle bg-' + winner.game_option.color + ' rounded-circle mx-2"></span>'
            }
        });
        $('#gameDetail #winners').html(winnersHtml);
        $('#setWinnerForm input[name="game_id"]').val(game.id);
    }

    const updateOptions = (options) => {
        var optionsHtml = '';
        options.forEach((option) => {
            var winnerHtml = '';
            var rewardsHtml = '';
            winnerHtml += '<div class="col-md-4 col-lg-3"><div class="option-item bg-dark m-2 p-2 text-white text-center" data-option-id="' + option.id + '"><p>Angka ' + option.number + '</p><p>' + option.calculated_point + ' point</p><p>' + option.bid_count + ' bids</p><p>Winners ';
            option.rewards.forEach((reward) => {
                if (reward.game_option.type == 'number') {
                    rewardsHtml += reward.game_option.number + ' ';
                } else {
                    rewardsHtml += '<span class="color-circle bg-' + reward.game_option.color + ' rounded-circle mx-2"></span>'
                }
            });
            winnerHtml += rewardsHtml + '</p></div></div>';
            optionsHtml += winnerHtml;
        });

        $('#gameOptions').html(optionsHtml);

        $('.option-item').click(function () {
            if (! isGameDisabled) {
                $('#setWinnerForm input[name="winner_option_id"]').val($(this).data('optionId'));
                $('#confirmModal').modal('show');
            } else {
                $('#alertModal').modal('show');
            }
        });
    }

    const startTimer = function (duration) {
        var timer = duration;
        var minutes, seconds;
        if (timer > 0) {
            // start interval countdown
            let gameInterval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                $('#gameTimer').text(minutes + ":" + seconds);

                if (--timer < 0 || (timer + 1) % 5 == 0) {
                    getGame();
                    clearInterval(gameInterval);
                }

                // lock bid if time left is 30s
                if (timer <= 10) {
                    if ($('#confirmModal').is(':visible')) {
                        $('#confirmModal').modal('hide');
                        $('#alertModal').modal('show');
                    }
                    isGameDisabled = true;
                }
            }, 1000);
        } else {
            getGame()
        }
    }

    const getGame = () => {
        $.get('/api/game/current', (data) => {
            // console.log(data)
            var game = data.game;
            var options = data.options;
            var gameEndTime = Math.ceil(Date.parse(game.ended_at) / 1000);
            var currentTime = Math.ceil(Date.parse(data.current_time) / 1000);

            isGameDisabled = false;
            startTimer(gameEndTime - currentTime);
            updateGameDetail(game);
            updateOptions(options);
        });
    }

    $(document).ready(function () {
        getGame();
        $('#confirmBtn').click(function () {
            $('#setWinnerForm').submit();
        });
    });
}
