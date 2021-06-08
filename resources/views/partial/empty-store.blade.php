@isset($httpQuery['search'])
    @include('store.product.empty', [
        'message' => "Oops, there's no point called <q>" . $httpQuery['search'] . "</q> on this categories"
    ])
@else
    @include('store.product.empty', [
        'message' => "Oops, there's no products at the moment on this categories"
    ])
@endisset