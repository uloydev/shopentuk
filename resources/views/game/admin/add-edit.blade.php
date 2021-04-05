<x-modal-template id="addCustomGame" form-target="form-add-game" title-modal="Add new custom game">
    @include('game.admin.form', ['idForm' => 'form-add-game'])
</x-modal-template>
<x-modal-template id="ediCustomtGame" form-target="form-edit-game" title-modal="Edit custom game">
    @include('game.admin.form', ['idForm' => 'form-edit-game'])
</x-modal-template>