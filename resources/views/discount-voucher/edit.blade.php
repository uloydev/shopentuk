<div class="modal fade" id="modal-edit-voucher" tabindex="-1" role="dialog" aria-labelledby="modal-edit-voucher-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-edit-voucher-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on manage-product.js --}}" method="post">
                    @csrf
                    @method('put')
                    @php
                        $inputs = [
                            [
                                'id' => 'name',
                                'name' => 'name',
                                'type' => 'text',
                            ],
                            [
                                'id' => 'code',
                                'name' => 'code',
                                'type' => 'text',
                            ],
                            [
                                'id' => 'discount_value',
                                'name' => 'discount_value',
                                'type' => 'number',
                            ],
                            [
                                'id' => 'expired_at',
                                'name' => 'expired_at',
                                'type' => 'datetime-local'
                            ]
                        ];
                    @endphp

                    @foreach ($inputs as $input)
                        <x-input-template id="{{ 'product-' . $input['id'] }}" 
                        label="{{ str_replace('-', ' ', 'product-' . $input['id']) }}"
                        placeholder="Input the {{ $input['name'] }} of the voucher" 
                        name="{{ $input['name'] }}" type="{{ $input['type'] }}"
                        add-class="text-capitalize" required />
                    @endforeach
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Update voucher
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>