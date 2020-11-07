<div id="modalAddCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalAddCategoryLabel">
                    Add new category
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.all-category.store') }}" 
                method="post" id="form-add-sub-category">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="parentCategory">Pick a parent category</label>
                        <select class="custom-select @error('category') is-invalid @enderror mr-sm-2" 
                        name="category" id="parentCategory" aria-describedby="helperTitle" required autofocus>
                            <option disabled>Pick category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $loop->first ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                            @endforeach
                        </select>
                        <a href="javascript:void(0)" id="helperTitle" class="form-text text-primary"
                        data-target="#modalAddParentCategory" data-toggle="modal">
                            <small>Add new parent category</small>
                        </a>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="sub-category">
                            Type a new sub category
                        </label>
                        <input type="text" name="subcategory" id="sub-category" 
                        placeholder="Ex: Car - electric" required
                        class="form-control @error('subcategory') is-invalid @enderror">
                        @error('subcategory')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="form-add-sub-category">Add new category</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modalAddParentCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalAddParentCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalAddParentCategoryLabel">
                    Add new parent category
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.all-category.store') }}" id="form-add-parent-category" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="parent-category">
                            Type a new parent category
                        </label>
                        <input type="text" name="parent_category" id="parent-category" 
                        placeholder="Ex: Car - electric" required
                        class="form-control @error('subcategory') is-invalid @enderror">
                        @error('subcategory')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="form-add-parent-category">
                    Add new paremt category
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const modalParentCategory = $("#modalAddParentCategory");
        const modalSubCategory = $("#modalAddCategory");

        modalParentCategory.on('show.bs.modal', function(e){
            modalSubCategory.modal('hide')
        });
        modalParentCategory.on('hide.bs.modal', function(e){
            modalSubCategory.modal('show')
        });
    </script>
@endpush