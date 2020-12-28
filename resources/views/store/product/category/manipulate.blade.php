<div class="modal fade modal-manipulate-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">{{-- title set on js --}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span>x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=""
                data-add-link="{{ route('admin.all-category.sub.store', $category->id) }}"
                method="post" id="form-edit-sub-category">
                    @csrf
                    <div class="form-group">
                        {{-- <label class="form-control-label" for="parent-category">
                            Pick a parent category
                        </label> --}}
                        {{-- <select class="custom-select @error('category') is-invalid @enderror mr-sm-2 category__parent" 
                        name="category" id="parent-category" aria-describedby="helperTitle" 
                        required autofocus>
                            <option disabled>Pick category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $loop->first ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                            @endforeach
                        </select> --}}
                    </div>
                    <x-input-template type="text" name="subcategory" label="Type a sub category" 
                    id="sub-category" placeholder="Ex: celana" required />
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="form-edit-sub-category">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const modalParentCategory = $("#modalAddParentCategory");
        const modalSubCategory = $("#modalEditCategory");

        modalParentCategory.on('show.bs.modal', function(e){
            modalSubCategory.modal('hide')
        });
        modalParentCategory.on('hide.bs.modal', function(e){
            modalSubCategory.modal('show')
        });
    </script>
@endpush