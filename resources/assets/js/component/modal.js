//show feedback popup
$('button[data-target="#modal-feedback"]').on('click', function (event) {
    const message = $(this).data('message')
    const email = $(this).data('email')
    $('#modal-feedback .modal-title').text('Feedback from ' + email)
    $('#modal-feedback .modal-body').html(message)
})

//input resi popup
$('#inputResiModal').on('show.bs.modal', function (event) {
    const modal = $(this)
    const btnTriggered = $(event.relatedTarget)
    let orderId = btnTriggered.data('order-id')

    modal.find('#order-id').text(orderId)
    modal.find('input[name="order_id"]').val(orderId)
})