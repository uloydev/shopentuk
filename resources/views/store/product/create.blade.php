<div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog" aria-labelledby="modal-add-product-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-add-product-label">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{ route('admin.products.store') }}" method="post">
                    @csrf

                    <x-input-template id="title"
                        label="title"
                        placeholder="Input the title of the product" name="title"
                        type="text" add-class="text-capitalize" required />
                            
                    <x-input-template id="price"
                        label="price"
                        placeholder="Input the price of the product" name="price"
                            type="number" add-class="text-capitalize" required />
                            
                    <x-input-template id="point-price"
                        label="Point Price"
                        placeholder="Input the point price of the product" name="point_price"
                        type="number" add-class="text-capitalize" required />
                        
                    <x-input-template id="point-bonus"
                        label="Point Bonus"
                        placeholder="Input the point bonus of the product" name="point_bonus"
                        type="number" add-class="text-capitalize" required />
                        
                    <x-input-template id="weight"
                        label="Weight"
                        placeholder="Input the weight of the product" name="weight"
                        type="number" add-class="text-capitalize" required />

                    <x-select-template label="category" id="category-id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </x-select-template>
                    <x-select-template label="sub category" id="sub-category-id" name="sub_category_id">
                        @foreach ($subCategories as $sub)
                            <option value="{{ $sub->id }}" data-parent-category-id="{{ $sub->category_id }}">
                                {{ $sub->title }}</option>
                        @endforeach
                    </x-select-template>
                    <div class="form-group">
                        <label for="inputImage">Product Image</label>
                        <input type="file" class="form-control-file" id="inputImage" name="image">
                    </div>
                    <div class="form-group">
                        <label for="add-desc">Description</label>
                        <textarea class="form-control" id="add-desc" rows="5" name="description"
                            placeholder="Deskripsi produk usahakan tidak lebih dari 100 karakter" maxlength="100"
                            required></textarea>
                    </div>
                    <p class="mb-0 mt-2">Redeemable with point ?</p>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_redeem" id="is_redeem1" value="1"
                                required>
                            <label class="form-check-label" for="is_redeem1">
                                Yes, Redeemable
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_redeem" id="is_redeem2" value="0"
                                required>
                            <label class="form-check-label" for="is_redeem2">
                                No Redeemable
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Add product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
