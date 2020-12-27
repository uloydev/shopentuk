<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="modal-edit-product-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-edit-product-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on assets/js/page/admin/manage-product.js --}}" method="post">
                    @csrf
                    <x-input-template id="product-title" label="product title"
                    placeholder="Input the title of the product" name="title" required />
                    <x-input-template id="product-price" type="number" label="product price"
                    placeholder="Input the price of the product" name="price" required />
                    <x-input-template id="product-point" type="number" min="1" label="product point"
                    placeholder="Input the point of the product" name="point" required />
                    
                    <x-select-template label="category" id="category-id" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </x-select-template>
                    <x-select-template label="sub category" id="sub-category-id" name="sub-category">
                        @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}"
                            data-parent-category="{{ $subCategory->productCategory->title }}">
                            {{ $subCategory->title }}
                        </option>
                        @endforeach
                    </x-select-template>
                </form>
            </div>
        </div>
    </div>
</div>