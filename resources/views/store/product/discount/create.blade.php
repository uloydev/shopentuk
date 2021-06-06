<div class="modal fade" id="modal-add-discount" tabindex="-1" role="dialog" aria-labelledby="modal-add-product-discount-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-add-product-discount-label">Add product discount</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product-discounts.store') }}" method="post">
                    @csrf
                    <x-select-template label="pilih product" id="product" name="product_id" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->title }}</option>
                        @endforeach
                    </x-select-template>
                    <x-input-template id="discounted_price"
                            label="Discounted Price"
                            type="number" add-class="text-capitalize" required />
                    <button type="submit" class="btn waves-effect waves-light btn-primary mt-5">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>