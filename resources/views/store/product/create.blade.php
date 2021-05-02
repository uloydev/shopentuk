<div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog" aria-labelledby="modal-add-product-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-add-product-label">Add New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on manage-product.js --}}" method="post">
                    @csrf @method('PUT')
                    @php
                        $inputs = [
                            [
                                'id' => 'title',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'id' => 'price',
                                'name' => 'price',
                                'type' => 'number',
                            ],
                            [
                                'id' => 'point',
                                'name' => 'point_price',
                                'type' => 'number',
                            ]
                        ];
                    @endphp

                    @foreach ($inputs as $input)
                        <x-input-template id="{{ 'product-' . $input['id'] }}" 
                        label="{{ str_replace('-', ' ', 'product-' . $input['id']) }}"
                        placeholder="Input the {{ $input['name'] }} of the product" 
                        name="{{ $input['name'] }}" type="{{ $input['type'] }}"
                        add-class="text-capitalize" required />
                    @endforeach
                    <x-select-template label="category" 
                    id="category-id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </x-select-template>
                    <x-select-template label="sub category" 
                    id="sub-category-id" name="sub_category_id">
                        @foreach ($subCategories as $sub)
                            <option value="{{ $sub->id }}" data-parent-category-id="{{ $sub->category_id }}">{{ $sub->title }}</option>
                        @endforeach
                    </x-select-template>
                    <div class="form-group">
                        <label for="add-desc">Description</label>
                        <textarea class="form-control" id="add-desc" rows="5" name="description"
                        placeholder="Deskripsi produk usahakan tidak lebih dari 100 karakter" 
                        maxlength="100" required></textarea>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Update product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>