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

//delete admin confirmation
$("#modalConfirmDelete").on('show.bs.modal', function (event) {
    const btnTriggered = $(event.relatedTarget)
    const adminId = btnTriggered.data('admin-id')
    const deleteUrl = btnTriggered.data('delete-url')

    $(this).find("form").attr('action', deleteUrl)
})

//add admin modal
$("#addNewAdmin").on('show.bs.modal', function (event) {
    const btnTriggered = $(event.relatedTarget)
    const formUrl = btnTriggered.data('form-url')

    $(this).find('form').attr('action', formUrl)
})

//edit admin modal
$("#editAdmin").on('show.bs.modal', function (event) {
    const btnTriggered = $(event.relatedTarget)
    const formUrl = btnTriggered.data('form-url')
    const adminName = btnTriggered.data('admin-name')
    const adminEmail = btnTriggered.data('admin-email')
    const adminPhone = btnTriggered.data('admin-phone')

    $(this).find("#admin-name-edit").val(adminName)
    $(this).find("#admin-email-edit").val(adminEmail)
    $(this).find("#admin-phone-edit").val(adminPhone)
    $(this).find('form').attr('action', formUrl)
})