<x-modal-template id="addNewAdmin" form-target="form-add-admin" title-modal="Add new admin">
    @include('admin.form', ['idForm' => 'form-add-admin'])
</x-modal-template>
<x-modal-template id="editAdmin" form-target="form-edit-admin" title-modal="Edit admin detail">
    @include('admin.form', ['idForm' => 'form-edit-admin'])
</x-modal-template>