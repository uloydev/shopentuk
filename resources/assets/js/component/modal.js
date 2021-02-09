$('button[data-target="#modal-feedback"]').on('click', function (event) {
    const message = $(this).data('message')
    const email = $(this).data('email')
    $('#modal-feedback .modal-title').text('Feedback from ' + email)
    $('#modal-feedback .modal-body').html(message)
})