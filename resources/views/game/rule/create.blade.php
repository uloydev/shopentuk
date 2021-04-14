<div class="modal fade" id="modal-add-rule" tabindex="-1" role="dialog" aria-labelledby="modal-add-rule-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-add-rule-label">Add Rule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.rules.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="add-content">Rule Content</label>
                        <textarea class="form-control" id="add-content" rows="5" name="content"
                        placeholder="Rule usahakan tidak lebih dari 100 karakter" 
                        maxlength="100" required></textarea>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Submit Rule
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>