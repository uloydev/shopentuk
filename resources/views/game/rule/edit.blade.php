<div class="modal fade" id="modal-edit-rule" tabindex="-1" role="dialog" aria-labelledby="modal-edit-rule-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-edit-rule-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on manage-product.js --}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="edit-desc">Description</label>
                        <textarea class="form-control" id="edit-content" rows="5" name="content"
                        placeholder="Deskripsi produk usahakan tidak lebih dari 100 karakter" 
                        maxlength="100" required></textarea>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Update Rule
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>