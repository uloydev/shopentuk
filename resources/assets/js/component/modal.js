//show feedback popup
$('.table-manage-feedback').on('click', 'button[data-target="#modal-feedback"]', function (event) {
    const message = $(this).data('message')
    const email = $(this).data('email')
    $('#modal-feedback .modal-title').text('Feedback from ' + email)
    $('#modal-feedback .modal-body').html(message)
})

//input resi popup
$('.table-manage-new-order').on('click', 'button[data-target="#inputResiModal"]', function (event) {
    const modal = $("#inputResiModal")
    const btnTriggered = $(this)
    let orderId = btnTriggered.data('order-id')

    modal.find('#order-id').text(orderId)
    modal.find('input[name="order_id"]').val(orderId)
})

//delete admin confirmation
$(".table-manage-admin").on('click', 'button[data-target="#modalConfirmDeleteAdmin"]', function (event) {
    console.log('ok');
    const btnTriggered = $(this)
    const deleteUrl = btnTriggered.data('delete-url')

    $("#modalConfirmDeleteAdmin form").attr('action', deleteUrl)
})

//add admin modal
$("#addNewAdmin").on('show.bs.modal', function (event) {
    const btnTriggered = $(event.relatedTarget)
    const formUrl = btnTriggered.data('form-url')

    $(this).find('form').attr('action', formUrl)
})

//edit admin modal
$(".table-manage-admin").on('click', 'button[data-target="#editAdmin"]', function (event) {
    const btnTriggered = $(this)
    const formUrl = btnTriggered.data('form-url')
    const adminName = btnTriggered.data('admin-name')
    const adminEmail = btnTriggered.data('admin-email')
    const adminPhone = btnTriggered.data('admin-phone')

    $('#editAdmin').find("#admin-name-edit").val(adminName)
    $('#editAdmin').find("#admin-email-edit").val(adminEmail)
    $('#editAdmin').find("#admin-phone-edit").val(adminPhone)
    $('#editAdmin').find('form').attr('action', formUrl)
})