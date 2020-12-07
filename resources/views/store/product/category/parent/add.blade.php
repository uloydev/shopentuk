<div class="modal fade" id="modal-add-parent-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">Add new primary category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.all-category.parent.store') }}" 
                method="post" id="form-add-parent-category">
                    @csrf
                    <x-input-template type="text" name="primary_category" 
                    label="Type a new primary category"
                    id="primary-category" placeholder="Ex: Car" required />
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="form-add-parent-category">
                    Add it
                </button>
            </div>
        </div>
    </div>
</div>