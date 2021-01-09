<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="modal-edit-product-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-edit-product-label"></h4>
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
                            ],
                            [
                                'id' => 'category-id',
                                'name' => 'category_id',
                                'type' => 'select'
                            ]
                        ];

                        $selects = [
                            [
                                'id' => 'category-id',
                                'label' => 'category'
                            ],
                            [
                                'id' => 'sub-category-id',
                                'label' => 'sub category'
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
                    @foreach ($selects as $select)
                        <x-select-template label="{{ $select['label'] }}" 
                        id="{{ $select['id'] }}" name="{{ str_replace('-', '_', $select['id']) }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </x-select-template>
                    @endforeach
                    <div class="form-group">
                        <label for="edit-desc">Description</label>
                        <textarea class="form-control" id="edit-desc" rows="5" name="description"
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