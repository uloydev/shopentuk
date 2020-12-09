<div class="modal fade" id="modal-manipulate-primary-category" 
tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">{{-- title set on JS --}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.all-category.parent.store') }}" 
                method="post" id="form-add-parent-category">
                    @csrf
                    <x-input-template type="text" name="title" 
                    label="Type a new primary category"
                    id="primary-category" placeholder="Ex: Car" required />
                    <div class="form-group">
                        <label class="form-control-label">
                            Description
                        </label>
                        <textarea class="form-control desc-category" rows="3" 
                        placeholder="Ex: This is car category" name="description"></textarea>
                    </div>
                    <fieldset class="checkbox">
                        <label>
                            <input type="checkbox" value="true" name="is_digital_product">
                            <span>Mark this category for digital product</span>
                        </label>
                    </fieldset>
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